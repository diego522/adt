<?php

class SolicitudController extends Controller {

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
                'actions' => array('view', 'viewSolicitudes'),
                'roles' => array(Rol::$SUPER_USUARIO, Rol::$ALUMNO, Rol::$PROFESOR, Rol::$ADMINISTRADOR),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'delete'),
                'roles' => array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR, Rol::$ALUMNO),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('resolverSituacion', 'resolverSituacionGuia'),
                'roles' => array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR, Rol::$PROFESOR),
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
        $proyecto = Proyecto::model()->findByPk($model->id_proyecto);
        $this->renderPartial('view', array(
            'model' => $model,
            'link' => CHtml::link($proyecto->idPropuesta ? $proyecto->idPropuesta->titulo : '', array('proyecto/view', 'id' => $model->id_proyecto,))
                ), false, true);
    }

    //entra la id del proyecto
    public function actionViewSolicitudes($id) {
        $model = new Solicitud('viewSolicitudes');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Solicitud']))
            $model->attributes = $_GET['Solicitud'];

        $this->render('viewSolicitudes', array(
            'model' => $model, 'idP' => $id
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($idp) {
        $model = new Solicitud('create');
        $modelProyecto = Proyecto::model()->findByPk($idp);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if ($modelProyecto != null && $modelProyecto->estado_avance == Estado::$AVANCE_SIENDO_REVISADO_POR_PROFESIR_GUIA) {
            if (isset($_POST['Solicitud'])) {
                $model->attributes = $_POST['Solicitud'];
                $model->id_proyecto = $idp;
                $model->estado = Estado::$SOLICITUD_PENDIENTE_DE_REVISION;
                $model->creador = Yii::app()->user->id;
                if ($model->save()) {
                    $model = Solicitud::model()->findByPk($model->id_solicitud);
                    $nombreAlumno = '';
                    foreach ($model->idProyecto->idPropuesta->propuestaInscritas as $pro) {
                        $nombreAlumno.= $pro->usuario0->nombre . "<br/>";
                    }

                    $this->SendMail('Solicitud de aplazamiento', '
                                       Estimado(a) Profesor ' . $model->idProyecto->profGuia->nombre . ', junto con saludarle, mediante este correo le notificamos 
                                       que se creado una solicitud de aplazamiento para el proyecto  "' . $model->idProyecto->idPropuesta->titulo . '", en el que participan el (los) alumno(s)<br/>' . $nombreAlumno . '
                                         ', $model->idProyecto->profGuia->email);

                    //Correo alumnos
                    foreach ($model->idProyecto->idPropuesta->propuestaInscritas as $pro) {
                        $this->SendMail('Solicitud de aplazamiento', '
                                       Estimado(a) Profesor ' . $pro->usuario0->nombre . ', junto con saludarle, mediante este correo le notificamos 
                                       que se creado una solicitud de aplazamiento para el proyecto  "' . $model->idProyecto->idPropuesta->titulo . '", en el que participan el (los) alumno(s)<br/>' . $nombreAlumno . '
                                         ', $pro->usuario0->email);
                    }

                    $this->redirect(array('viewSolicitudes', 'id' => $idp));
                }
            }
            $this->render('create', array(
                'model' => $model,
            ));
        } else {
            $this->render('error', array(
                'mensaje' => 'El proyecto se encuentra en un estado en el que no puede ser aplazado',
            ));
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $model->scenario = 'update';
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Solicitud'])) {
            $model->attributes = $_POST['Solicitud'];
            if ($model->save()) {
                $this->redirect(array('viewSolicitudes', 'id' => $model->id_proyecto));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionResolverSituacionGuia($id) {
        $model = $this->loadModel($id);
        $model->scenario = 'resolver';
        $proyecto = Proyecto::model()->findByPk($model->id_proyecto);
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Solicitud'])) {
            $model->attributes = $_POST['Solicitud'];
            if ($model->save()) {
                $nombreAlumno = '';
                foreach ($model->idProyecto->idPropuesta->propuestaInscritas as $pro) {
                    $nombreAlumno.= $pro->usuario0->nombre . "<br/>";
                }
                $this->SendMail('Respuesta de la Solicitud de aplazamiento', '
                                       Estimado(a) Profesor ' . $model->idProyecto->profGuia->nombre . ', junto con saludarle, mediante este correo le notificamos 
                                       que la solicitud de aplazamiento para el proyecto "' . $model->idProyecto->idPropuesta->titulo . '" se encuentra "' . $model->estado0->nombre . '".
                                         ', $model->idProyecto->profGuia->email);
                //correo jefe carrea
                $this->SendMail('Respuesta de la Solicitud de aplazamiento', '
                                       Estimado(a) Jefe de carrera, junto con saludarle, mediante este correo le notificamos 
                                       que se creado una solicitud de aplazamiento para el proyecto de actividad de titulación"
                                       ' . $model->idProyecto->idPropuesta->titulo . '", en el que participan el (los) alumno(s)<br/>' . $nombreAlumno . '
                                         ', PeticionesWebService::obtieneCorreoJefe(Yii::app()->user->getState('campus')));
                //cc
                $this->SendMail('Solicitud de aplazamiento', '
                                       Estimado(a) Jefe de Carrera/Director de Escuela, junto con saludarle, mediante este correo le notificamos 
                                       que la solicitud de aplazamiento para el proyecto "' . $model->idProyecto->idPropuesta->titulo . '" se encuentra "' . $model->estado0->nombre . '".
                                         ', PeticionesWebService::obtieneCorreoSecretaria(Yii::app()->user->getState('campus')));
                //Correo alumnos
                foreach ($model->idProyecto->idPropuesta->propuestaInscritas as $pro) {
                    $this->SendMail('Respuesta de la Solicitud de aplazamiento', '
                                       Estimado(a) ' . $pro->usuario0->nombre . ', junto con saludarle, mediante este correo le notificamos 
                                       que la solicitud de aplazamiento para el proyecto "' . $model->idProyecto->idPropuesta->titulo . '" se encuentra "' . $model->estado0->nombre
                            , $pro->usuario0->email);
                }
                $this->redirect(array('viewSolicitudes','id'=>$model->id_proyecto));
            }
        }


        $this->render('resolverSituacionGuia', array(
            'model' => $model,
            'link' => CHtml::link($proyecto->idPropuesta ? $proyecto->idPropuesta->titulo : '', array('proyecto/view', 'id' => $model->id_proyecto,))
        ));
    }

    public function actionResolverSituacion($id) {
        $model = $this->loadModel($id);
        $model->scenario = 'resolver';
        $proyecto = Proyecto::model()->findByPk($model->id_proyecto);
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Solicitud'])) {
            $model->attributes = $_POST['Solicitud'];
            if ($model->save()) {
                $nombreAlumno = '';
                foreach ($model->idProyecto->idPropuesta->propuestaInscritas as $pro) {
                    $nombreAlumno.= $pro->usuario0->nombre . "<br/>";
                }
                $this->SendMail('Respuesta de la Solicitud de aplazamiento', '
                                       Estimado(a) Profesor ' . $model->idProyecto->profGuia->nombre . ', junto con saludarle, mediante este correo le notificamos 
                                       que la solicitud de aplazamiento para el proyecto "' . $model->idProyecto->idPropuesta->titulo . '" se encuentra "' . $model->estado0->nombre . '".
                                         ', $model->idProyecto->profGuia->email);
                //correo jefe carrea
                $this->SendMail('Respuesta de la Solicitud de aplazamiento', '
                                       Estimado(a) Jefe de carrera, junto con saludarle, mediante este correo le notificamos 
                                       que se creado una solicitud de aplazamiento para el proyecto de actividad de titulación"
                                       ' . $model->idProyecto->idPropuesta->titulo . '", en el que participan el (los) alumno(s)<br/>' . $nombreAlumno . '
                                         ', PeticionesWebService::obtieneCorreoJefe(Yii::app()->user->getState('campus')));
                //cc
                $this->SendMail('Solicitud de aplazamiento', '
                                       Estimado(a) Jefe de Carrera/Director de Escuela, junto con saludarle, mediante este correo le notificamos 
                                       que la solicitud de aplazamiento para el proyecto "' . $model->idProyecto->idPropuesta->titulo . '" se encuentra "' . $model->estado0->nombre . '".
                                         ', PeticionesWebService::obtieneCorreoSecretaria(Yii::app()->user->getState('campus')));
                //Correo alumnos
                foreach ($model->idProyecto->idPropuesta->propuestaInscritas as $pro) {
                    $this->SendMail('Respuesta de la Solicitud de aplazamiento', '
                                       Estimado(a) ' . $pro->usuario0->nombre . ', junto con saludarle, mediante este correo le notificamos 
                                       que la solicitud de aplazamiento para el proyecto "' . $model->idProyecto->idPropuesta->titulo . '" se encuentra "' . $model->estado0->nombre
                            , $pro->usuario0->email);
                }
                $this->redirect(array('admin',));
            }
        }
        $this->render('resolverSituacion', array(
            'model' => $model,
            'link' => CHtml::link($proyecto->idPropuesta ? $proyecto->idPropuesta->titulo : '', array('proyecto/view', 'id' => $model->id_proyecto,))
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Solicitud');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Solicitud('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Solicitud']))
            $model->attributes = $_GET['Solicitud'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Solicitud the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Solicitud::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'La petición no existe.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Solicitud $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'solicitud-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function gridCreador($data, $row) {
        return Usuario::model()->findByPk($data->creador)->nombre;
    }

    public function gridLink($data, $row) {
        $link = '';
        if ($data->estado == Estado::$SOLICITUD_PENDIENTE_DE_REVISION) {
            if ( $data->idProyecto->prof_guia == Yii::app()->user->id ||Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR))) {
                //para aprobar 
                $link = CHtml::normalizeUrl(array('resolverSituacionGuia', 'id'=>$data->id_solicitud));
            }
        } else if ($data->estado == Estado::$SOLICITUD_APROBADA_PROFESOR_GUIA) {
            if (Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR))) {
                //para aprobar 
                $link = CHtml::normalizeUrl(array('resolverSituacion', 'id'=>$data->id_solicitud));
            }
        } else {
            
        }
        return $link;
    }

    public function gridEstado($data, $row) {
        return Estado::model()->findByPk($data->estado)->nombre;
    }

    public function gridProyecto($data, $row) {
        $proyecto = Proyecto::model()->findByPk($data->id_proyecto);
        if ($proyecto != NUll) {
            return CHtml::link($proyecto->idPropuesta ? $proyecto->idPropuesta->titulo : '', array('proyecto/view', 'id' => $data->id_proyecto,));
        }
        return '';
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
