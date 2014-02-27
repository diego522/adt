<?php

class PlanificacionController extends Controller {

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
                'actions' => array('index', 'view', 'lista'),
                'roles' => array(Rol::$SUPER_USUARIO, Rol::$ALUMNO, Rol::$PROFESOR, Rol::$ADMINISTRADOR),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update',),
                'roles' => array(Rol::$SUPER_USUARIO, Rol::$ALUMNO, Rol::$PROFESOR, Rol::$ADMINISTRADOR),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('hitoCumplido', 'delete'),
                'roles' => array(Rol::$SUPER_USUARIO, Rol::$PROFESOR, Rol::$ADMINISTRADOR),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin',),
                'roles' => array(Rol::$SUPER_USUARIO),
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
        $modelAvance = new Avance('search');
        $modelAvance->unsetAttributes();  // clear any default values
        if (isset($_GET['Avance']))
            $modelAvance->attributes = $_GET['Avance'];
        $this->render('view', array(
            'model' => $model,
            'modelAvance' => $modelAvance,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($idp) {
        $model = new Planificacion;

        // Uncomment the following line if AJAX validation is needed
        /* if (isset($_POST['ajax']) && $_POST['ajax'] === 'planificacion-form') {
          echo CActiveForm::validate($model);
          Yii::app()->end();
          } */
        $model->id_proyecto = $idp;
        if (isset($_POST['Planificacion'])) {
            $model->attributes = $_POST['Planificacion'];
            if ($model->save()) {
                Yii::app()->user->setFlash('success', "Hito creado correctamente");
                $this->redirect(array('view', 'id' => $model->id_planificacion));
            }
        }
        $this->render('create', array(
            'model' => $model, 'idp' => $idp,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        //$this->performAjaxValidation($model);
        //$model->id_proyecto = $idp;
        if (Yii::app()->user->id == $model->creador || Yii::app()->user->checkeaAccesoMasivo(array(Rol::$ADMINISTRADOR, Rol::$SUPER_USUARIO))) {
            if (isset($_POST['Planificacion'])) {
                $model->attributes = $_POST['Planificacion'];
                if ($model->save()) {
                    Yii::app()->user->setFlash('success', "Hito modificado correctamente");
                    $this->redirect(array('view', 'id' => $model->id_planificacion));
                }
            }

            $this->render('update', array(
                'model' => $model,
            ));
        } else {
            throw new CHttpException(403, 'Ud. no es el creador del hito, no tiene permiso para modificarlo');
        }
    }

    public function actionHitoCumplido($id) {
        $model = $this->loadModel($id);
        $model->estado = Estado::$PLANIFICACION_CUMPLIDA;
        $model->fecha_hito_cumplido = Yii::app()->dateFormatter->format("dd/MM/y", strtotime(date('Y-m-d')));
        $model->save();
        $this->redirect(array('view', 'id' => $model->id_planificacion));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $model = $this->loadModel($id);
        if (Yii::app()->user->id == $model->creador || Yii::app()->user->checkeaAccesoMasivo(array(Rol::$ADMINISTRADOR, Rol::$SUPER_USUARIO))) {
            $id_p = $model->id_proyecto;
            $model->delete();
            Yii::app()->user->setFlash('success', "Hito eliminado");
            $this->redirect(array('lista', 'idp' => $id_p));
        } else {
            throw new CHttpException(403, 'No tiene permiso para realizar esta acción');
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex($idp) {
        $model = new Planificacion('search');
        $proyecto = Proyecto::model()->findByPk($idp);
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Planificacion']))
            $model->attributes = $_GET['Planificacion'];
        $this->render('index', array(
            'model' => $model, 'idp' => $idp,
            'titulo' => $proyecto->idPropuesta->titulo
        ));
    }

    public function actionLista($idp) {
        // $condicion = "id_proyecto=" . $idp;
        //$dataProvider = new CActiveDataProvider('Planificacion', array('criteria' => array('condition' => $condicion)));
        $model = new Planificacion('search');
        $proyecto = Proyecto::model()->findByPk($idp);
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Planificacion']))
            $model->attributes = $_GET['Planificacion'];
        $this->render('index', array(
            'model' => $model, 'idp' => $idp,
            'titulo' => $proyecto->idPropuesta->titulo
        ));

        /* $this->render('index', array(
          'dataProvider' => $dataProvider, 'idp' => $idp,
          )); */
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Planificacion('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Planificacion']))
            $model->attributes = $_GET['Planificacion'];
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Planificacion the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Planificacion::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'La petición no existe');
        return $model;
    }

    public function gridCorreccion($data, $row) {
        $correccion = Correccion::model()->find('id_avance=:ida', array(':ida' => $data->id_avance));
        if ($correccion != NULL) {
            //existe correccion
            $tabla = "<table><tr><td>" . CHtml::link('Ver', array('correccion/view', 'id' => $correccion->id_correccion), array('id' => 'inline')) . "</td><td>";
            if (Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$PROFESOR, Rol::$ADMINISTRADOR))) {
                $tabla.= CHtml::link('Modificar', array('correccion/update', 'id' => $correccion->id_correccion), array('id' => 'inline')) . "</td>";
            }
            $tabla.= "</tr></table>";
            return $tabla;
        } else {
            //no hay 
            return CHtml::link('Agregar', array('correccion/createDesdeAvance', 'idp' => $data->id_proyecto, 'ida' => $data->id_avance), array('id' => 'inline'));
        }
    }

    public function gridTituloHito($data, $row) {
        return CHtml::link($data->titulo, array('view', 'id' => $data->id_planificacion));
    }

    public function gridEstadoHito($data, $row) {
        return $data->estado0->nombre;
    }

    public function gridProgreso($data, $row) {
        return $data->avance . "%";
    }

    /**
     * Performs the AJAX validation.
     * @param Planificacion $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'planificacion-form') {
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
