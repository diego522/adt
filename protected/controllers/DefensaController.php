<?php

class DefensaController extends Controller {

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
                'actions' => array('view'),
                'roles' => array(Rol::$SUPER_USUARIO, Rol::$ALUMNO, Rol::$PROFESOR, Rol::$ADMINISTRADOR,),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'roles' => array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
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
        $this->renderPartial('view', array(
            'model' => $this->loadModel($id),
                ), false, true);
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * 
     */
    public function actionCreate($idp) {
        $model = new Defensa;
        $modelProyecto = Proyecto::model()->findByPk($idp);
        if ($modelProyecto->estado_avance == Estado::$AVANCE_ESPERNADO_PLANIFICAR_DEFENSA) {
            $modelProyecto->scenario = 'creaDefensa';
            $model->id_proyecto = $idp;
            if (isset($_POST['ajax']) && $_POST['ajax'] === 'defensa-form') {
                echo CActiveForm::validate(array($model, $modelProyecto));
                Yii::app()->end();
            }
            if (isset($_POST['Defensa'])) {
                $model->attributes = $_POST['Defensa'];
                $modelProyecto->attributes = $_POST['Proyecto'];
                $modelProyecto->estado_avance = Estado::$AVANCE_ESPERNADO_DEFENSA;
                $modelProyecto->fecha_defensa = $model->fecha_programacion;
                $correos = array();
                if ($model->save() && $modelProyecto->save()) {
                    $model = Defensa::model()->findByPk($model->id_defensa);

                    $nombreAlumno = "<ul>";
                    foreach ($model->idProyecto->idPropuesta->propuestaInscritas as $pro) {
                        $nombreAlumno.= "<li>".$pro->usuario0->nombre . " </li>";
                    }
                    $nombreAlumno .= "</ul>";

                    foreach ($model->idProyecto->idPropuesta->propuestaInscritas as $pro) {
                        $correos[] = $pro->usuario0->email;
                    }
                    if ($model->idProyecto->prof_sala != $modelProyecto->prof_sala && $modelProyecto->profSala != NULL) {
                        
                    }
                }
                $modelProyecto = Proyecto::model()->findByPk($model->id_proyecto);
                $correos[] = $modelProyecto->profSala->email;
                $correos[] = PeticionesWebService::obtieneCorreoJefe(Yii::app()->user->getState('campus'));
                $correos[] = PeticionesWebService::obtieneCorreoSecretaria(Yii::app()->user->getState('campus'));
                $this->SendMail('Asignación de profesor sala', '
                                Estimado(a) Profesor(a) ' . $modelProyecto->profSala->nombre . '. <br/> 
                               <br/>Junto con saludarle, 
                               mediante este correo notificamos a usted 
                               que ha sido asignado como profesor sala
                               del proyecto de título llamado  "' . $modelProyecto->idPropuesta->titulo . '", desarrollado por 
                               el(los) estudiante(s) <br/>' . $nombreAlumno . '.
                                   <br/>
                                   Posteriormente recibirá un correo informando la fecha y lugar de la defensa.
                               ', $correos);
                //notificar mendiante correos
                if ($model->idProyecto->profGuia) {
                    $correos[] = $model->idProyecto->profGuia->email;
                }
                if ($model->idProyecto->profSala) {
                    $correos[] = $model->idProyecto->profSala->email;
                }
                if ($model->idProyecto->profInformante) {
                    $correos[] = $model->idProyecto->profInformante->email;
                }
                $this->SendMail('Defensa Proyecto de Título - ' . $model->fecha_programacion.'', ' Estimado(a) memorista(s) y profesores <br/><br/>
                                Junto con saludarles, comunico a Ustedes que la defensa del proyecto de título llamado "' . $model->idProyecto->idPropuesta->titulo . '"
                                    desarrollado por los estudiantes 
                                ' . $nombreAlumno . '
                                    se realizará el día <b>' . $model->fecha_programacion . ' hrs.</b>, en <b>' . $model->lugar . '</b>.
                                        <br/>
                                        <br/>
                                La comisión evaluadora estará compuesta por:<br/>
                                <b>Profesor Guía: </b>' . $modelProyecto->profGuia->nombre . '<br/>
                                <b>Profesor Informante: </b>' . $modelProyecto->profInformante->nombre . '<br/>
                                <b>Profesor Sala: </b>' . $modelProyecto->profSala->nombre . '<br/>
                                       <br/>
                                   Se solicita a los memoristas llegar con al menos 30 minutos de anticipación, para realizar todas las pruebas necesarias con el objetivo de asegurar el
                                   éxito de la presentación.                                   
                                ', $correos);

                //correo para laboratorio
                if (Yii::app()->user->getState('campus') == '2') {
                    $this->SendMail('Solicitud de registro fotográfico defensa - ' . $model->fecha_programacion.' hrs.', 'Estimado Encargado de Laboratorio, <br/><br/>
                                Junto con saludarle, comunico a Usted que la defensa del proyecto de título llamado "' . $model->idProyecto->idPropuesta->titulo . '"
                                    desarrollado por el(los) estudiante(s) 
                                ' . $nombreAlumno . '
                                    se realizará el día <b>' . $model->fecha_programacion . ' hrs.</b>, en <b>' . $model->lugar . '</b>.
                                        <br/>
                                
                                       <br/>
                                   Se solicita tomar fotografía, al término de la defensa, para los registros de la carrera.                                   
                                ', Yii::app()->params['laboratorioCorreo']);
                }

                Yii::app()->user->setFlash('success', "Defensa programada y ha sido notificada correctamente");
                $this->redirect(array('proyecto/view', 'id' => $model->id_proyecto));
            }
            $this->renderPartial('create', array(
                'model' => $model,
                'modelProyecto' => $modelProyecto,
                    ), false, true);
        } else {
            $this->renderPartial('error', array(
                'mensaje' => "El proyecto se encuentra en un estado en el que no puede ser planificada la defensa.",
                    ), false, true);
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
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        //$modelProyecto->estado_avance == Estado::$AVANCE_ESPERNADO_DEFENSA
        if (true) {
            $modelProyecto->scenario = 'creaDefensa';
            if (isset($_POST['ajax']) && $_POST['ajax'] === 'defensa-form') {
                echo CActiveForm::validate(array($model, $modelProyecto));
                Yii::app()->end();
            }
            if (isset($_POST['Defensa'])) {
                $model->attributes = $_POST['Defensa'];
                $modelProyecto->attributes = $_POST['Proyecto'];
                $modelProyecto->fecha_defensa = $model->fecha_programacion;
                if ($model->save() && $modelProyecto->save()) {
                    $model = Defensa::model()->findByPk($model->id_defensa);
                    $modelProyecto = Proyecto::model()->findByPk($model->id_proyecto);
                    $correos = array();
                    $nombreAlumno = "";
                    foreach ($model->idProyecto->idPropuesta->propuestaInscritas as $pro) {
                        $nombreAlumno.= $pro->usuario0->nombre . "<br/>";
                    }
                    if ($model->idProyecto->prof_sala != $modelProyecto->prof_sala) {
                        //actualización prof sala
                        if ($model->idProyecto->profSala) {
                            $this->SendMail('Asignación de profesor sala', 'Estimado(a) profesor ' . $model->idProyecto->profSala->nombre . '<br/><br/>
                                Junto con saludarle, comunico a usted que ha sido asignado como profesor sala para el 
                                proyecto de título llamado "' . $model->idProyecto->idPropuesta->titulo . '"
                                    desarrollado por los estudiantes 
                                ' . $nombreAlumno . '
                                    se realizará el día <b>' . $model->fecha_programacion . '</b>.
                                   <br/>
                                   Posteriormente recibirá un correo informando la fecha y lugar de la defensa.
                                   <br/>
                                ', $correos);
                        }
                    }
                }
                //notificar mendiante correos
                foreach ($model->idProyecto->idPropuesta->propuestaInscritas as $pro) {
                    $correos[] = $pro->usuario0->email;
                }
                if ($model->idProyecto->profGuia) {
                    $correos[] = $model->idProyecto->profGuia->email;
                }
                if ($model->idProyecto->profSala) {
                    $correos[] = $model->idProyecto->profSala->email;
                }
                if ($model->idProyecto->profInformante) {
                    $correos[] = $model->idProyecto->profInformante->email;
                }
                $this->SendMail('Defensa Proyecto de Título - ' . $model->fecha_programacion, ' Estimado(a) memorista(s) y profesores <br/><br/>
                                Junto con saludarles, comunico a ustedes que la defensa del proyecto de título llamado "' . $model->idProyecto->idPropuesta->titulo . '"
                                    desarrollado por los estudiantes 
                                ' . $nombreAlumno . '
                                    se realizará el día <b>' . $model->fecha_programacion . '</b>, en <b>' . $model->lugar . '</b>.
                                        <br/>
                                        <br/>
                                La comisión evaluadora estará compuesta por:<br/>
                                <b>Profesor Guía: </b>' . $modelProyecto->profGuia->nombre . '<br/>
                                <b>Profesor Informante: </b>' . $modelProyecto->profInformante->nombre . '<br/>
                                <b>Profesor Sala: </b>' . $modelProyecto->profSala->nombre . '<br/>

                                   Se solicita a los memoristas llegar con al menos 30 min de anticipación, para realizar todas las pruebas necesarias con el objetivo de asegurar el
                                   éxito de la presentación.
                                   <br/>
                                   
                                ', $correos);

                Yii::app()->user->setFlash('success', "Defensa programada y ha sido notificada correctamente");
                $this->redirect(array('proyecto/view', 'id' => $model->id_proyecto));
            }
            $this->renderPartial('update', array(
                'model' => $model,
                'modelProyecto' => $modelProyecto,
                    ), false, true);
        } else {
            $this->renderPartial('error', array(
                'mensaje' => "El proyecto se encuentra en un estado en el que no puede ser planificada la defensa.",
                    ), false, true);
        }
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $model = $this->loadModel($id);
        $id = $model->id_proyecto;
        $this->redirect(array('proyecto/view', 'id' => $id));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Defensa');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Defensa('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Defensa']))
            $model->attributes = $_GET['Defensa'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Defensa the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Defensa::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Defensa $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'defensa-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function SendMail($asunto, $mensaje, $para) {
        $message = new YiiMailMessage;
        $message->subject = $asunto ? $asunto : 'Asunto';
        $mensaje.="<br/>
            <br/>
Cualquier consulta dirigirla a secretaría de carrera (" . PeticionesWebService::obtieneCorreoSecretaria(Yii::app()->user->getState('campus')) . ")
<br/>--<br/>Atte.<br/> Administrador de sistemas de Ingeniería Civil en Informática UBB<br/>" . Yii::app()->getBaseUrl(true) . " <br/> Éste correo no debe ser respondido.";
        $message->setBody($mensaje, 'text/html'); //codificar el html de la vista
        $message->from = (Yii::app()->params['adminEmail']); // alias del q envia
        $message->setTo($para); // a quien se le envia
        Yii::app()->mail->send($message);
    }

}

