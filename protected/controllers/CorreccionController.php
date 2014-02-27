<?php

class CorreccionController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'lista', 'download', 'listaPorAvance'),
                'roles' => array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR, Rol::$ALUMNO, Rol::$PROFESOR),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'delete', 'createDesdeAvance'),
                'roles' => array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR, Rol::$PROFESOR),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin',),
                'roles' => array(Rol::$SUPER_USUARIO,),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionUploadFile($model) {
//guardar archivo
        $uploadedFileBN = CUploadedFile::getInstance($model, 'adjunto');
        if ($uploadedFileBN != NULL) {
            if (in_array($uploadedFileBN->extensionName, Adjunto::$formatos_acepotados)) {
                $nombre = str_replace(" ", "_", "ad_correccion_" . $model->id_proyecto . "_" . "{$uploadedFileBN}");
                $rutaCarpeta = Yii::app()->basePath . Yii::app()->params['ruta_adjunto'] . Yii::app()->params['ruta_proyecto'] . "/" . $model->id_proyecto . Yii::app()->params['adjuntos_correccion'];
                if (!is_dir($rutaCarpeta)) {
                    mkdir($rutaCarpeta, 0777, true);
                }
                $rutaArchivo = $rutaCarpeta . "/" . $nombre;
                if ($uploadedFileBN->saveAs($rutaArchivo)) {
                    $adjuntoModel = new Adjunto;
                    $adjuntoModel->ruta = $rutaArchivo;
                    $adjuntoModel->filecontenttype = $uploadedFileBN->getType();
                    $adjuntoModel->filename = $nombre;
                    $adjuntoModel->creador = Yii::app()->user->id;
                    $adjuntoModel->save();
                    $model->adjunto = $adjuntoModel->id_adjunto;
                    $model->save();
                } else {
                    Yii::app()->user->setFlash('error', "problemas al guardar el archivo");
                }
            } else {
                Yii::app()->user->setFlash('error', "Solo extensiones " . implode(',', Adjunto::$formatos_acepotados) . " son permitidas");
            }
        }
    }

    public function actionDownload($id) {
        $adjuntoModel = Adjunto::model()->findByPk($id);
        if ($adjuntoModel != null)
            Yii::app()->request->sendFile($adjuntoModel->filename, file_get_contents($adjuntoModel->ruta), $adjuntoModel->filecontenttype);
        else
            $this->actionView($id);
    }

    public function actionLista($idp) {
        $condicion = "id_proyecto=" . $idp;
        $dataProvider = new CActiveDataProvider('Correccion', array('criteria' => array('condition' => $condicion)));
        $this->render('index', array(
            'dataProvider' => $dataProvider, 'idp' => $idp,
        ));
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->renderPartial('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($idp) {
        $model = new Correccion;
        $model->id_proyecto = $idp;
        if (isset($_POST['Correccion'])) {
            $model->attributes = $_POST['Correccion'];
            $model->creador = Yii::app()->user->id;
            if ($model->save()) {
                $this->actionUploadFile($model);
                $this->redirect(array('view', 'id' => $model->id_correccion));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionCreateDesdeAvance($idp, $ida) {
        $model = new Correccion;

        $modelProyecto = Proyecto::model()->findByPk($idp);
        if ($modelProyecto != NULL && $modelProyecto->estado_actual == Estado::$PROYECTO_EN_DESARROLLO) {
            if (isset($_POST['ajax']) && $_POST['ajax'] === 'correccion-form') {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
            $model->id_proyecto = $idp;
            $model->id_avance = $ida;
            if (isset($_POST['Correccion'])) {
                $model->attributes = $_POST['Correccion'];
                $model->creador = Yii::app()->user->id;
                if ($model->save()) {
                    $this->actionUploadFile($model);
                    $avance = Avance::model()->findByPk($ida);
                    foreach ($avance->idProyecto->idPropuesta->propuestaInscritas as $pro) {
                        $this->SendMail('Nueva correción en el proyecto', '<h2>Se ha agregado una nueva corrección</h2>
                                       Estimado(a) ' . $pro->usuario0->nombre . ', se ha añadido una nueva corrección en el proyecto
                                            <i><b>"' . $avance->idProyecto->idPropuesta->titulo . '"</b>, en el hito <b>' . $avance->idPlanificacion->titulo . '<b/> con título de avance <b>' . $avance->titulo . '</b></i> . 
                                       Para más detalles se le ruega visite el sistema
                                       de la carrera sección Proyectos > Mis Proyectos > Planificación.', $pro->usuario0->email);
                    }
                    $this->redirect(array('planificacion/view', 'id' => $avance->id_planificacion));
// $this->redirect(array('view', 'id' => $model->id_correccion));
                }
            }
            $this->renderPartial('create', array('model' => $model,), false, true);
        } else {
            $this->renderPartial('error', array('mensaje' => 'El proyecto no se encuentra disponible para modificaciones.',), FALSE, true);
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $modelProyecto = Proyecto::model()->findByPk($model->id_proyecto);
        if ($modelProyecto != NULL && $modelProyecto->estado_actual == Estado::$PROYECTO_EN_DESARROLLO) {
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);
            if (isset($_POST['ajax']) && $_POST['ajax'] === 'correccion-form') {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
            if (isset($_POST['Correccion'])) {
                $model->attributes = $_POST['Correccion'];
                if ($model->save()) {
                    $this->actionUploadFile($model);
                    $avance = Avance::model()->findByPk($model->id_avance);
                    foreach ($avance->idProyecto->idPropuesta->propuestaInscritas as $pro) {
                        $this->SendMail('Modificacion de correción en el proyecto', '<h2>Se ha modificado una corrección</h2>
                                       Estimado(a) ' . $pro->usuario0->nombre . ', se ha modificado una corrección en el proyecto
                                            <i><b>"' . $avance->idProyecto->idPropuesta->titulo . '"</b>, en el hito <b>' . $avance->idPlanificacion->titulo . '<b/> con título de avance <b>' . $avance->titulo . '</b></i> . 
                                       Para más detalles se le ruega visite el sistema
                                       de la carrera sección Proyectos > Mis Proyectos > Planificación.', $pro->usuario0->email);
                    }
                    $this->redirect(array('planificacion/view', 'id' => $avance->id_planificacion));
//$this->redirect(array('view', 'id' => $model->id_correccion));
                }
            }

            $this->renderPartial('update', array(
                'model' => $model, false, true
            ));
        } else {
            $this->renderPartial('error', array('mensaje' => 'El proyecto no se encuentra disponible para modificaciones.',), FALSE, true);
        }
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $model = $this->loadModel($id);
        $modelProyecto = Proyecto::model()->findByPk($model->id_proyecto);
        if ($modelProyecto != NULL && $modelProyecto->estado_actual == Estado::$PROYECTO_EN_DESARROLLO) {
            $avance = Avance::model()->findByPk($model->id_avance);
            $model->delete();
            $this->redirect(array('planificacion/view', 'id' => $avance->id_planificacion));
        } else {
            throw new CHttpException(403, 'El proyecto no se encuentra disponible para modificaciones.');
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex($idp) {
        $condicion = "id_proyecto=" . $idp;
        $dataProvider = new CActiveDataProvider('Correccion', array('criteria' => array('condition' => $condicion)));
        $this->render('index', array(
            'dataProvider' => $dataProvider, 'idp' => $idp,
        ));
    }

    public function actionListaPorAvance($idp, $ida) {
        $condicion = "id_proyecto=" . $idp . " and id_avance=" . $ida;
        $dataProvider = new CActiveDataProvider('Correccion', array('criteria' => array('condition' => $condicion)));
        $this->render('index', array(
            'dataProvider' => $dataProvider, 'idp' => $idp, 'ida' => $ida,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Correccion('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Correccion']))
            $model->attributes = $_GET['Correccion'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Correccion the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Correccion::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'La petición no existe.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Correccion $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'correccion-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function SendMail($asunto, $mensaje, $para) {
        $message = new YiiMailMessage;
        $message->subject = $asunto ? $asunto : 'Asunto';
        $mensaje.="<br/>--<br/>Atte.<br/> <b>Administrador de sistemas de Ingeniería Civil en Informática UBB<b/><br/>" . Yii::app()->getBaseUrl(true) . " <br/> Éste correo no debe ser respondido.";
        $message->setBody($mensaje, 'text/html'); //codificar el html de la vista
        $message->from = (Yii::app()->params['adminEmail']); // alias del q envia
        $message->setTo($para); // a quien se le envia
        Yii::app()->mail->send($message);
    }

}
