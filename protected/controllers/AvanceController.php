<?php

class AvanceController extends Controller {

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
                'actions' => array('index', 'view', 'lista', 'download', 'listaPorPlanificiacion'),
                'roles' => array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR, Rol::$ALUMNO, Rol::$PROFESOR, Rol::$PROFESOR),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'delete', 'createDesdePlanificacion'),
                'roles' => array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR, Rol::$ALUMNO, Rol::$PROFESOR),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin',),
                'roles' => array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR,),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $model = $this->loadModel($id);
        $this->renderPartial('view', array('model' => $model, 'idPlan' => $model->id_planificacion,), false, true);
        /* $this->render('view', array(
          'model' => $model,
          'idPlan'=>$model->id_planificacion,
          )); */
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($idp) {
        $model = new Avance;
        $model->id_proyecto = $idp;
        $modelProyecto = Proyecto::model()->findByPk($idp);
        if ($modelProyecto != NULL && $modelProyecto->estado_actual == Estado::$PROYECTO_EN_DESARROLLO) {
            if (isset($_POST['Avance'])) {
                $model->attributes = $_POST['Avance'];
                $model->creador = Yii::app()->user->id;

                if ($model->save()) {
                    $this->actionUploadFile($model);
                    $modelCreado = Avance::model()->findByPk($model->id_avance);
                    $this->SendMail('Nuevo avance de proyecto "' . $modelCreado->idProyecto->idPropuesta->titulo . '"', '<h2>Se ha agregado un nuevo avance en el proyecto ' . $modelCreado->idProyecto->idPropuesta->titulo . '</h2>
                                       Estimado(a) profesor ' . $modelCreado->idProyecto->profGuia->nombre . ', se ha añadido un avanace en el proyecto
                                            <i><b>"' . $modelCreado->idProyecto->idPropuesta->titulo . '"</b>, en el hito <b>' . $modelCreado->idPlanificacion->titulo . '<b/> con título <b>' . $modelCreado->titulo . '</b></i> . 
                                       Para más detalles se le ruega visite el sistema
                                       de la carrera sección Proyectos > Mis Proyectos > Planificación.', $modelCreado->idProyecto->profGuia->email);
                    foreach ($modelCreado->idProyecto->idPropuesta->propuestaInscritas as $pro) {
                        $this->SendMail('Nuevo avance de proyecto', '<h2>Se ha agregado un nuevo avance</h2>
                                       Estimado(a) ' . $pro->usuario0->nombre . ', se ha añadido un avanace en el proyecto
                                            <i><b>"' . $modelCreado->idProyecto->idPropuesta->titulo . '"</b>, en el hito <b>' . $modelCreado->idPlanificacion->titulo . '<b/> con título <b>' . $modelCreado->titulo . '</b></i> . 
                                       Para más detalles se le ruega visite el sistema
                                       de la carrera sección Proyectos > Mis Proyectos > Planificación.', $pro->usuario0->email);
                    }
                    $this->redirect(array('view', 'id' => $model->id_avance));
                }
            }
            $this->render('create', array(
                'model' => $model,
            ));
        } else {
            throw new CHttpException(403, 'El proyecto no se encuentra disponible para modificaciones.');
        }
    }

    public function actionCreateDesdePlanificacion($idp, $idPlan) {
        $model = new Avance;
        $model->id_proyecto = $idp;
        $model->id_planificacion = $idPlan;
        $modelProyecto = Proyecto::model()->findByPk($idp);
        if ($modelProyecto != NULL && $modelProyecto->estado_actual == Estado::$PROYECTO_EN_DESARROLLO) {
            if (isset($_POST['ajax']) && $_POST['ajax'] === 'avance-form') {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
            if (isset($_POST['Avance'])) {
                $model->attributes = $_POST['Avance'];
                $model->creador = Yii::app()->user->id;
                if ($model->save()) {
                    $this->actionUploadFile($model);

                    $modelCreado = Avance::model()->findByPk($model->id_avance);
                    $this->SendMail('Nuevo avance de proyecto "' . $modelCreado->idProyecto->idPropuesta->titulo . '"', '<h2>Se ha agregado un nuevo avance en el proyecto ' . $modelCreado->idProyecto->idPropuesta->titulo . '</h2>
                                       Estimado(a) profesor ' . $modelCreado->idProyecto->profGuia->nombre . ', se ha añadido un avanace en el proyecto
                                            <i><b>"' . $modelCreado->idProyecto->idPropuesta->titulo . '"</b>, en el hito <b>' . $modelCreado->idPlanificacion->titulo . '<b/> con título <b>' . $modelCreado->titulo . '</b></i> . 
                                       Para más detalles se le ruega visite el sistema
                                       de la carrera sección Proyectos > Mis Proyectos > Planificación.', $modelCreado->idProyecto->profGuia->email);
                    foreach ($modelCreado->idProyecto->idPropuesta->propuestaInscritas as $pro) {
                        $this->SendMail('Nuevo avance de proyecto', '<h2>Se ha agregado un nuevo avance</h2>
                                       Estimado(a) ' . $pro->usuario0->nombre . ', se ha añadido un avanace en el proyecto
                                            <i><b>"' . $modelCreado->idProyecto->idPropuesta->titulo . '"</b>, en el hito <b>' . $modelCreado->idPlanificacion->titulo . '<b/> con título <b>' . $modelCreado->titulo . '</b></i> . 
                                       Para más detalles se le ruega visite el sistema
                                       de la carrera sección Proyectos > Mis Proyectos > Planificación.', $pro->usuario0->email);
                    }
                    //
                    $this->redirect(array('planificacion/view', 'id' => $model->id_planificacion));
                }
            }
            $this->renderPartial('create', array('model' => $model,), FALSE, true);
        } else {
            $this->renderPartial('error', array('mensaje' => 'El proyecto no se encuentra disponible para modificaciones.',), FALSE, true);
        }
    }

    public function actionUploadFile($model) {
        //guardar archivo
        $uploadedFileBN = CUploadedFile::getInstance($model, 'ruta_adjunto');
        if ($uploadedFileBN != NULL) {
            if (in_array($uploadedFileBN->extensionName, Adjunto::$formatos_acepotados)) {
                $nombre = str_replace(" ", "_", "ad_avance_" . $model->id_proyecto . "_" . "{$uploadedFileBN}");
                $rutaCarpeta = Yii::app()->basePath . Yii::app()->params['ruta_adjunto'] . Yii::app()->params['ruta_proyecto'] . "/" . $model->id_proyecto . Yii::app()->params['adjuntos_avance'];
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
                    $model->ruta_adjunto = $adjuntoModel->id_adjunto;
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
        $dataProvider = new CActiveDataProvider('Avance', array('criteria' => array('condition' => $condicion)));
        $this->render('index', array(
            'dataProvider' => $dataProvider, 'idp' => $idp,
        ));
    }

    public function actionListaPorPlanificiacion($idp, $idPlan) {
        $condicion = "id_proyecto=" . $idp . " and id_planificacion=" . $idPlan;
        $dataProvider = new CActiveDataProvider('Avance', array('criteria' => array('condition' => $condicion)));
        $this->render('index', array(
            'dataProvider' => $dataProvider, 'idp' => $idp, 'idPlan' => $idPlan,
        ));
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
            if (isset($_POST['ajax']) && $_POST['ajax'] === 'avance-form') {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
            if (isset($_POST['Avance'])) {
                $model->attributes = $_POST['Avance'];
                if ($model->save()) {
                    $this->actionUploadFile($model);
                    $this->redirect(array('planificacion/view', 'id' => $model->id_planificacion));
                }
            }
            $this->renderPartial('update', array('model' => $model,), false, true);
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
            $idp = $model->id_planificacion;
            $model->delete();
            $this->redirect(array('planificacion/view', 'id' => $idp));
        } else {
            throw new CHttpException(403, 'El proyecto no se encuentra disponible para modificaciones.');
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex($idp) {
        $condicion = "id_proyecto=" . $idp;
        $dataProvider = new CActiveDataProvider('Avance', array('criteria' => array('condition' => $condicion)));
        $this->render('index', array(
            'dataProvider' => $dataProvider, 'idp' => $idp,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Avance('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Avance']))
            $model->attributes = $_GET['Avance'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Avance the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Avance::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'La petición no existe');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Avance $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'avance-form') {
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
