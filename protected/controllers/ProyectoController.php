<?php

class ProyectoController extends Controller {

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
                'actions' => array('index', 'view', 'cartaDeCompromiso'),
                'roles' => array(Rol::$SUPER_USUARIO, Rol::$ALUMNO, Rol::$PROFESOR, Rol::$ADMINISTRADOR, Rol::$DISENADOR),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'notificaGuia', 'repruebaProyecto', 'notificaInformante','generarActaDefensa', 'generarActaFinal'),
                'roles' => array(Rol::$SUPER_USUARIO, Rol::$PROFESOR, Rol::$ADMINISTRADOR),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'listaPDF', 'excelConFiltros', 'asignaProfeInformante', 'informanteRetiraProyecto', 'cierraProyecto', 'notificaEntregaDeEmpasteYDisco'),
                'roles' => array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR),
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
        $tabla = $this->gridParticipantes($model);
        $encargado = EmpresaProyecto::model()->find('id_proyecto=' . $model->id_proyecto);
        $this->render('view', array(
            'model' => $model,
            'tabla' => $tabla,
            'encargado' => $encargado,
            'tablaCambios' => $this->gridHistorialDeCambios($model)
        ));
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionCierraProyecto($id) {
        $model = $this->loadModel($id);
        $mensaje = '';
        $evaluacionesTerminadas = true;
        if ($model->estado_avance == Estado::$AVANCE_ESPERNADO_DEFENSA) {
            foreach ($model->idPropuesta->propuestaInscritas as $prop) {
                $evaluacionGuiaProyecto = EvaluacionProyectoGuia::model()->find('id_alumno=' . $prop->usuario0->id_usuario . ' and id_proyecto=' . $model->id_proyecto . ' and id_evaluacion_proyecto_guia_padre is NULL');
                if ($evaluacionGuiaProyecto == NULL) {
                    $mensaje.=' - Falta evaluación del <b>profesor guía</b> ' . $model->profGuia->nombre . ' en el <b>proyecto</b> para el alumno ' . $prop->usuario0->nombre . "<br/>";
                    $evaluacionesTerminadas = false;
                }
                $evaluacionInformanteProyecto = EvaluacionProyectoInformante::model()->find('id_alumno=' . $prop->usuario0->id_usuario . ' and id_proyecto=' . $model->id_proyecto . ' and id_evaluacion_proyecto_informante_padre is NULL');
                if ($evaluacionInformanteProyecto == NULL) {
                    $mensaje.=' - Falta evaluación del <b>profesor informante</b> ' . $model->profInformante->nombre . ' en el <b>proyecto</b> para el alumno ' . $prop->usuario0->nombre . "<br/>";
                    $evaluacionesTerminadas = false;
                }
                $evaluacionGuiaDefensa = EvaluacionDefensaGuia::model()->find('id_alumno=' . $prop->usuario0->id_usuario . ' and id_proyecto=' . $model->id_proyecto . ' and id_evaluacion_defensa_guia_padre is NULL');
                if ($evaluacionGuiaDefensa == NULL) {
                    $mensaje.=' - Falta evaluación del <b>profesor guía</b> ' . $model->profGuia->nombre . ' en la <b>defensa</b> para el alumno ' . $prop->usuario0->nombre . "<br/>";
                    $evaluacionesTerminadas = false;
                }
                $evaluacionInformanteDefensa = EvaluacionDefensaInformante::model()->find('id_alumno=' . $prop->usuario0->id_usuario . ' and id_proyecto=' . $model->id_proyecto . ' and id_evaluacion_defensa_informante_padre is NULL');
                if ($evaluacionInformanteDefensa == NULL) {
                    $mensaje.=' - Falta completar evaluación del <b>profesor informante</b> ' . $model->profInformante->nombre . ' en la <b>defensa</b> para el alumno ' . $prop->usuario0->nombre . "<br/>";
                    $evaluacionesTerminadas = false;
                }
                $evaluacionSalaDefensa = EvaluacionDefensaSala::model()->find('id_alumno=' . $prop->usuario0->id_usuario . ' and id_proyecto=' . $model->id_proyecto . ' and id_evaluacion_defensa_sala_padre is NULL');
                if ($evaluacionSalaDefensa == NULL) {
                    $mensaje.=' - Falta evaluación del <b>profesor sala</b> en ' . $model->profSala->nombre . ' la <b>defensa</b> para el alumno ' . $prop->usuario0->nombre . "<br/>";
                    $evaluacionesTerminadas = false;
                }
            }
            if ($evaluacionesTerminadas == TRUE) {
                $model->estado_actual = Estado::$PROYECTO_APROBADO;
                $model->estado_avance = Estado::$AVANCE_DEFENDIDO;
                $model->save();
                Yii::app()->user->setFlash('success', "Proyecto cerrado correctamente");
            } else {
                Yii::app()->user->setFlash('error', "El proyecto no puede ser cerrado por lo siguiente <br/>" . $mensaje);
            }
        } else {
            Yii::app()->user->setFlash('error', "El proyecto está en estado <b>" . $model->estadoAvance->nombre . "</b>, no puede ser cerrado");
        }
        $this->redirect(array('view', 'id' => $model->id_proyecto));
    }

    public function actionGenerarActaDefensa($id, $idEG, $idEI, $idES) {
        $model = $this->loadModel($id);
        $evaluacionesDefensaSala = EvaluacionDefensaSala::model()->findByPk($idES);
        $evaluacionesDefensaInformante = EvaluacionDefensaInformante::model()->findByPk($idEI);
        $evaluacionesDefensaGuia = EvaluacionDefensaGuia::model()->findByPk($idEG);
        $html2pdf = Yii::app()->ePdf->HTML2PDF();
        $html2pdf->setDefaultFont('helvetica');
        $html2pdf->WriteHTML($this->renderPartial('actaDefensaPDF', array(
                    'model' => $model,
                    'modelInformante' => $evaluacionesDefensaInformante,
                    'modelSala' => $evaluacionesDefensaSala,
                    'modelGuia' => $evaluacionesDefensaGuia,
                        ), true));
        $html2pdf->Output('acta_defensa' . $evaluacionesDefensaInformante->idAlumno->nombre . '.pdf', 'D');
    }

    public function actionGenerarActaFinal($id, $idEG, $idEI, $idES, $idPEI, $idPEG) {
        $model = $this->loadModel($id);
        $evaluacionesDefensaSala = EvaluacionDefensaSala::model()->findByPk($idES);
        $evaluacionesDefensaInformante = EvaluacionDefensaInformante::model()->findByPk($idEI);
        $evaluacionesDefensaGuia = EvaluacionDefensaGuia::model()->findByPk($idEG);
        $evalProyectoGuia = EvaluacionProyectoGuia::model()->findByPk($idPEG);
        $evaluacionesProyectoInformante = EvaluacionProyectoInformante::model()->findByPk($idPEI);

        $html2pdf = Yii::app()->ePdf->HTML2PDF();
        $html2pdf->setDefaultFont('helvetica');
        $html2pdf->WriteHTML($this->renderPartial('actaFinalPDF', array(
                    'model' => $model,
                    'modelInformante' => $evaluacionesDefensaInformante,
                    'modelSala' => $evaluacionesDefensaSala,
                    'modelGuia' => $evaluacionesDefensaGuia,
                    'modelProyectoGuia' => $evalProyectoGuia,
                    'modelProyectoInformante' => $evaluacionesProyectoInformante,
                        ), true));
        $html2pdf->Output('acta_final_' . $evaluacionesDefensaInformante->idAlumno->nombre . '.pdf', 'D');
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Proyecto;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Proyecto'])) {
            $model->attributes = $_POST['Proyecto'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_proyecto));
        }
        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionInformanteRetiraProyecto($id) {
        $model = $this->loadModel($id);
        $model->scenario = "informateRetiraProyecto";
        if ($model->fecha_entrega_a_informante == NULL) {
            $model->fecha_entrega_a_informante = Yii::app()->dateFormatter->format("dd/MM/y HH:mm", strtotime(date('Y-m-d H:i:s')));
        }
        $this->performAjaxValidation($model);
        if ($model->estado_avance == Estado::$AVANCE_SIENDO_REVISADOR_POR_PROFESOR_INFORMANTE) {
            // Uncomment the following line if AJAX validation is needed
            if (isset($_POST['Proyecto'])) {
                $model->attributes = $_POST['Proyecto'];

                if ($model->save()) {
                    $this->redirect(array('view', 'id' => $model->id_proyecto));
                }
            }
            $this->renderPartial('informanteRetiraProyecto', array(
                'model' => $model,
                    ), false, true);
        } else {
            $this->renderPartial('error', array(
                'mensaje' => 'No puede realizar esta acción porque el proyecto se encuentra ' . $model->estadoAvance->nombre . '.',
                    ), false, true);
        }
    }

    public function actionNotificaEntregaDeEmpasteYDisco($id) {
        $model = $this->loadModel($id);
        //var_dump($_POST['Proyecto']);
        if (isset($_POST['Proyecto'])) {
            $model->attributes = $_POST['Proyecto'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_proyecto));
        }else {
            $this->renderPartial('notificaEntregaDeEmpasteYDisco', array('model' => $model,), false, true);
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {

        $model = $this->loadModel($id);
        if ($model->id_proyecto_padre == NULL) {
            $model->scenario = "actualiza";

            // Uncomment the following line if AJAX validation is needed
            $this->performAjaxValidation($model);
            if (isset($_POST['Proyecto'])) {
                //variables
                $actualizaProfGuia = FALSE;
                $actualizaProfInformante = FALSE;
                $actualizaProfSala = FALSE;
                $actualizaCalificacion = FALSE;
                $actualizaEstadoActual = FALSE;
                $actualizaEtapaDeAvance = FALSE;
                $model->attributes = $_POST['Proyecto'];
                $modelAntiguo = $this->loadModel($id);
                //actualización de profesores y calificaciones
                if ($model->prof_guia != $modelAntiguo->prof_guia) {
                    $actualizaProfGuia = TRUE;
                }
                if ($model->prof_informante != $modelAntiguo->prof_informante) {
                    $actualizaProfInformante = TRUE;
                }
                if ($model->estado_actual != $modelAntiguo->estado_actual) {
                    $actualizaEstadoActual = TRUE;
                }
                if ($model->estado_avance != $modelAntiguo->estado_avance) {
                    $actualizaEtapaDeAvance = TRUE;
                }
                if ($model->prof_informante != $modelAntiguo->prof_informante) {
                    $actualizaProfInformante = TRUE;
                }
                if ($model->prof_sala != $modelAntiguo->prof_sala) {
                    $actualizaProfSala = TRUE;
                }
                if (($model->calif_guia != $modelAntiguo->calif_guia) ||
                        ($model->calif_informante != $modelAntiguo->calif_informante) ||
                        ($model->calif_defensa_guia != $modelAntiguo->calif_defensa_guia) ||
                        ($model->calif_defensa_info != $modelAntiguo->calif_defensa_info) ||
                        ($model->calif_defensa_sala != $modelAntiguo->calif_defensa_sala)) {
                    $actualizaCalificacion = TRUE;
                }
                if ($model->save()) {
                    $modelActualizado = $this->loadModel($id);
                    $propuesta = Propuesta::model()->findByPk($modelActualizado->id_propuesta);
                    if ($actualizaProfGuia) {
                        //actualizar en la propuesta el profesor guia
                        if ($propuesta != NULL) {
                            $propuesta->profesor_guia = $modelActualizado->prof_guia;
                            $propuesta->save();
                        }
                    }
                    $this->redirect(array('view', 'id' => $model->id_proyecto));
                }
            }

            $this->render('update', array(
                'model' => $model,
            ));
        } else {
            throw new CHttpException(500, 'El proyecto pertenece al historial, no puede ser modificado');
        }
    }

    public function actionListaPDF() {
        $session = new CHttpSession;
        $session->open();
        if (isset($session['resultado_filtro_proyecto']))
            $model = Proyecto::model()->findAll($session['resultado_filtro_proyecto']);
        else
            $model = Proyecto::model()->findAll();
        if ($model != NULL) {
            $html2pdf = Yii::app()->ePdf->HTML2PDF();
            $html2pdf->setDefaultFont('helvetica');
            $html2pdf->WriteHTML($this->renderPartial('reporteListaProyectos', array('model' => $model,), true));
            $html2pdf->Output('lista_de_proyectos.pdf', 'D');
        } else {
            // Yii::app()->user->setFlash('error', "El reporte no puede ser generado");
            // $this->actionView($id);
        }
    }

    /**
     * 
     * @param integer $id
     * 
     */
    public function actionNotificaGuia($id) {
        $model = $this->loadModel($id);
        if ($model->estado_avance == Estado::$AVANCE_SIENDO_REVISADO_POR_PROFESIR_GUIA) {
            if ($model->prof_guia == Yii::app()->user->id || Yii::app()->user->checkeaAccesoMasivo(array(Rol::$ADMINISTRADOR, Rol::$SUPER_USUARIO))) {
                if (isset($_POST['Proyecto'])) {
                    $model->attributes = $_POST['Proyecto'];
                    $model->estado_avance = Estado::$AVANCE_ESPERANDO_ASIGNACION_DE_INFORMANTE;
                    $model->fecha_guia_notif_jefe_carr = Yii::app()->dateFormatter->format("dd/MM/y", strtotime(date('Y-m-d')));
                    //notificar mediante correos

                    if ($model->save()) {
                        $nombreAlumno = '<ul>';
                        foreach ($model->idPropuesta->propuestaInscritas as $pro) {
                            $nombreAlumno.= "<li>".$pro->usuario0->nombre . "</li>";
                        }
                        $nombreAlumno .= '</ul>';
                        $correo = array();
                        //email para profesor guia
                        $correo[] = $model->profGuia->email;
                        $correo[] = PeticionesWebService::obtieneCorreoJefe(Yii::app()->user->getState('campus'));
                        $correo[] = PeticionesWebService::obtieneCorreoSecretaria(Yii::app()->user->getState('campus'));
                        //cc
                        //Correo alumnos
                        foreach ($model->idPropuesta->propuestaInscritas as $pro) {
                            $correo[] = $pro->usuario0->email;
                        }
                        $this->SendMail('Notificación de Finalización del Proyecto', '
                                       Estimado(a) Jefe de Carrera/Director de Escuela, mediante éste correo se le informa que el proyecto
                                        de título <b>"' . $model->idPropuesta->titulo . '"</b>, del (o los) estudiante(s) <br/>' . $nombreAlumno . '
                                        ha sido autorizado por el Profesor Guía ' . $model->profGuia->nombre . ' para que continúe con la etapa de 
                                        revisión de Profesor
                                        Informante.', $correo);

                        Yii::app()->user->setFlash('success', "Proyecto Notificado con éxito, <b>recuerde registrar las calificaciones correspondientes.</b>");
                        $this->redirect(array('view', 'id' => $model->id_proyecto));
                    }
                } else {
                    $this->renderPartial('notificacionGuia', array(
                        'model' => $model,
                            ), false, true);
                }
            } else {
                $this->renderPartial('error', array(
                    'mensaje' => 'Ud. no está autorizado para notificar este proyecto.',
                        ), false, true);
            }
        } else {
            $this->renderPartial('error', array(
                'mensaje' => 'No puede realizar esta acción porque el proyecto se encuentra ' . $model->estadoAvance->nombre . '.',
                    ), false, true);
        }
    }

    /**
     * 
     * @param integer $id
     * 
     */
    public function actionNotificaInformante($id) {
        $model = $this->loadModel($id);
        if ($model->estado_avance == Estado::$AVANCE_SIENDO_REVISADOR_POR_PROFESOR_INFORMANTE) {
            if ($model->prof_informante == Yii::app()->user->id || Yii::app()->user->checkeaAccesoMasivo(array(Rol::$ADMINISTRADOR, Rol::$SUPER_USUARIO))) {
                if (isset($_POST['Proyecto'])) {
                    $model->attributes = $_POST['Proyecto'];
                    $model->estado_avance = Estado::$AVANCE_ESPERNADO_PLANIFICAR_DEFENSA;
                    $model->fecha_real_entrega_rev_informante = Yii::app()->dateFormatter->format("dd/MM/y", strtotime(date('Y-m-d')));
                    //notificar mediante correos

                    if ($model->save()) {
                        $nombreAlumno = '<ul>';
                        $correos = array();
                        foreach ($model->idPropuesta->propuestaInscritas as $pro) {
                            $nombreAlumno.= "<li>".$pro->usuario0->nombre . "</li>";
                        }
                        $nombreAlumno .= '</ul>';
                        //email para profesor guia 
                        $correos[] = PeticionesWebService::obtieneCorreoJefe(Yii::app()->user->getState('campus'));
                        $correos[] = PeticionesWebService::obtieneCorreoSecretaria(Yii::app()->user->getState('campus'));
                        $correos[] = $model->profInformante->email;
                        $correos[] = $model->profGuia->email;
                        //Correo alumnos
                        foreach ($model->idPropuesta->propuestaInscritas as $pro) {
                            $correos[] = $pro->usuario0->email;
                        }
                        $this->SendMail('Notificación de término de revisión del proyecto - Profesor Informante', "
                                       Estimado(a) Director de Escuela/Jefe de Carrera,<br/>
                                       <br/>
                                Este correo notifica el término de la revisión del profesor informante " . $model->profInformante->nombre . ", para el proyecto llamado " . $model->idPropuesta->titulo . ".  
                                A continuación el(los) memorista(s) " . $nombreAlumno . " deben iniciar sus trámites para la defensa, los cuales consisten en:
                                <ul>
                                       <li>Entrega de una copia de informe empastado</li>
                                        <li>Entrega de 4 DVD's que contengan el informe y el software desarrollado. </li>
                                </ul>
                                    <br/>
                            Estos materiales deben ser entregados en secretaría de carrera.
                    ", $correos);


                        Yii::app()->user->setFlash('success', "Proyecto Notificado con éxito, <b>recuerde agregar las calificaciones correspondientes.</b>");
                        $this->redirect(array('view', 'id' => $model->id_proyecto));
                    }
                } else {
                    $this->renderPartial('notificacionInformante', array(
                        'model' => $model,
                            ), false, true);
                }
            } else {
                $this->renderPartial('error', array(
                    'mensaje' => 'Ud. no está autorizado para notificar este proyecto.',
                        ), false, true);
            }
        } else {
            $this->renderPartial('error', array(
                'mensaje' => 'El proyecto se encuentra en el que el Profesor guía no puede notificarlo.',
                    ), false, true);
        }
    }

    public function actionRepruebaProyecto($id) {
        $model = $this->loadModel($id);
        $model->scenario = 'reprueba';
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'proyecto-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        if ($this->esPropietario($model)) {
            if (isset($_POST['Proyecto'])) {
                $model->attributes = $_POST['Proyecto'];
                $model->estado_actual = Estado::$PROYECTO_EN_REPROBADO;
                $model->fecha_reprobacion = Yii::app()->dateFormatter->format("dd/MM/y", strtotime(date('Y-m-d')));
                //notificar mediante correos
                if ($model->save()) {
                    $nombreAlumno = '<ul>';
                    foreach ($model->idPropuesta->propuestaInscritas as $pro) {
                        $nombreAlumno.= "<li>".$pro->usuario0->nombre . "</li>";
                    }
                    $nombreAlumno .= '</ul>';
                    //email para profesor guia 
                    $correos[] = PeticionesWebService::obtieneCorreoJefe(Yii::app()->user->getState('campus'));
                    $correos[] = PeticionesWebService::obtieneCorreoSecretaria(Yii::app()->user->getState('campus'));
                    $correos[] = $model->profGuia->email;
                    if ($model->profInformante)
                        $correos[] = $model->profInformante->email;
                    if ($model->profSala)
                        $correos[] = $model->profSala->email;

                    //Correo alumnos
                    foreach ($model->idPropuesta->propuestaInscritas as $pro) {
                        $correos[] = $pro->usuario0->email;
                    }

                    //email para profesor guia
                    $this->SendMail('Reprobación del proyecto', '
                                       Estimado(a) memorista(s), este correo le notifica  sobre la reprobación 
                                       del proyecto de título "' . $model->idPropuesta->titulo . '", en el que usted participa<br/>.
                                    El proyecto fué reprobado en la etapa "' . $model->estadoAvance->nombre . '", 
                                    la calificación puede ser observada en Mis proyectos > Proyecto seleccionado > Pestaña de Calificaciones.'
                            , $correos);
                    Yii::app()->user->setFlash('success', "Proyecto Notificado con éxito.");
                    $this->redirect(array('view', 'id' => $model->id_proyecto));
                }
            } else {
                $this->renderPartial('repruebaProyecto', array(
                    'model' => $model,
                        ), false, true);
            }
        } else {
            $this->renderPartial('error', array(
                'mensaje' => 'Ud. no está autorizado para notificar este proyecto.',
                    ), false, true);
        }
    }

    public function actionAsignaProfeInformante($idp) {
        $model = Proyecto::model()->findByPk($idp);
        if ($model->estado_avance == Estado::$AVANCE_ESPERANDO_ASIGNACION_DE_INFORMANTE ||
                $model->estado_avance == Estado::$AVANCE_SIENDO_REVISADOR_POR_PROFESOR_INFORMANTE) {
            $model->scenario = 'asignaInformante';
            if ($model->fecha_max_rev_informante == NULL)
                $model->fecha_max_rev_informante = Yii::app()->dateFormatter->format("dd/MM/y", strtotime(Utilidades::sumaDiasHabilesAfecha(date('Y-m-d'), Utilidades::$cantidadDiasMAXRevisionInformante)));

            if (isset($_POST['ajax']) && $_POST['ajax'] === 'proyecto-form') {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
            if (isset($_POST['Proyecto'])) {
                $model->attributes = $_POST['Proyecto'];
                $model->fecha_asigna_informante = Yii::app()->dateFormatter->format("dd/MM/y", strtotime(date('Y-m-d')));

                $model->estado_avance = Estado::$AVANCE_SIENDO_REVISADOR_POR_PROFESOR_INFORMANTE;
                if ($model->save()) {
                    $model = Proyecto::model()->findByPk($model->id_proyecto);
                    $nombreAlumno = '<ul>';
                    foreach ($model->idPropuesta->propuestaInscritas as $pro) {
                        $nombreAlumno.= "<li>".$pro->usuario0->nombre . "</li>";
                    }
                    $nombreAlumno .= '</ul>';
                    if ($model->profInformante != null) {
                        //email para profesor guia 
                        $correos[] = $model->profInformante->email;
                        $correos[] = PeticionesWebService::obtieneCorreoJefe(Yii::app()->user->getState('campus'));
                        $correos[] = PeticionesWebService::obtieneCorreoSecretaria(Yii::app()->user->getState('campus'));
                        $correos[] = $model->profGuia->email;

                        $this->SendMail('Asignación de profesor Informante', '
                                       Estimado(a) Profesor(a) ' . $model->profInformante->nombre . '. <br/> <br/>Junto con saludarle, mediante este correo notificamos a Usted 
                                       que ha sido asignado como profesor informante
                                        del proyecto de título llamado  "' . $model->idPropuesta->titulo . '", desarrollado por el(los) estudiante(s): <br/>' . $nombreAlumno . '
                                         <br/>
                                         Se le recuerda que debe retirar el informe impreso en secretaria de carrera a contar de hoy.
                                         El plazo máximo para revisión del informe y producto de software (si corresponde) es hasta el 
                                         día ' . $model->fecha_max_rev_informante . '.
                                         ', $correos);
                    }
                    Yii::app()->user->setFlash('success', "Asignación realizada correctamente");
                    $this->redirect(array('proyecto/view', 'id' => $model->id_proyecto));
                }
            }
            $this->renderPartial('asignaInformante', array(
                'model' => $model,
                    ), false, true);
        } else {
            $this->renderPartial('error', array(
                'mensaje' => "El proyecto se encuentra en un estado en el que no puede ser asignado el profesor informante.",
                    ), false, true);
        }
    }

    public function actionExcelConFiltros() {
        $session = new CHttpSession;
        $session->open();
        if (isset($session['resultado_filtro_proyecto']))
            $model = Proyecto::model()->findAll($session['resultado_filtro_proyecto']);
        else
            $model = Proyecto::model()->findAll();

        $fila = 1;
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

        $objPHPExcel->getActiveSheet()->setCellValue('A' . $fila, 'LISTA DE PROYECTOS - Generado el ' . date('d/m/Y H:i'));
        $objPHPExcel->getActiveSheet()->mergeCells('A' . $fila . ':H' . $fila);
        $objPHPExcel->getActiveSheet()->getStyle('A' . $fila)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet = $objPHPExcel->getActiveSheet();
        $sheet->getStyle('A' . $fila)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $sheet->getStyle('A' . $fila)->getFill()->getStartColor()->setRGB('DDD9D9');

        $fila++;

        /* TABLA DE DATOS */
        $objPHPExcel->getActiveSheet()->setCellValue('A' . $fila, 'Código');
        $sheet->getStyle('A' . $fila)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $sheet->getStyle('A' . $fila)->getFill()->getStartColor()->setRGB('DDD9D9');
        $objPHPExcel->getActiveSheet()->setCellValue('B' . $fila, 'Título');
        $sheet->getStyle('B' . $fila)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $sheet->getStyle('B' . $fila)->getFill()->getStartColor()->setRGB('DDD9D9');
        $objPHPExcel->getActiveSheet()->setCellValue('C' . $fila, 'Integrantes');
        $sheet->getStyle('C' . $fila)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $sheet->getStyle('C' . $fila)->getFill()->getStartColor()->setRGB('DDD9D9');
        $objPHPExcel->getActiveSheet()->setCellValue('D' . $fila, 'Diseñador');
        $sheet->getStyle('D' . $fila)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $sheet->getStyle('D' . $fila)->getFill()->getStartColor()->setRGB('DDD9D9');
        $objPHPExcel->getActiveSheet()->setCellValue('E' . $fila, 'Carta compr.');
        $sheet->getStyle('E' . $fila)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $sheet->getStyle('E' . $fila)->getFill()->getStartColor()->setRGB('DDD9D9');
        $objPHPExcel->getActiveSheet()->setCellValue('F' . $fila, 'Prof. Guía');
        $sheet->getStyle('F' . $fila)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $sheet->getStyle('F' . $fila)->getFill()->getStartColor()->setRGB('DDD9D9');
        $objPHPExcel->getActiveSheet()->setCellValue('G' . $fila, 'Prof. Infor.');
        $sheet->getStyle('G' . $fila)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $sheet->getStyle('G' . $fila)->getFill()->getStartColor()->setRGB('DDD9D9');
        $objPHPExcel->getActiveSheet()->setCellValue('H' . $fila, 'Prof. Sala');
        $sheet->getStyle('H' . $fila)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $sheet->getStyle('H' . $fila)->getFill()->getStartColor()->setRGB('DDD9D9');
        $objPHPExcel->getActiveSheet()->setCellValue('I' . $fila, 'Fecha inicio');
        $sheet->getStyle('I' . $fila)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $sheet->getStyle('I' . $fila)->getFill()->getStartColor()->setRGB('DDD9D9');
        $objPHPExcel->getActiveSheet()->setCellValue('J' . $fila, 'Fecha fin');
        $sheet->getStyle('J' . $fila)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $sheet->getStyle('J' . $fila)->getFill()->getStartColor()->setRGB('DDD9D9');
        $objPHPExcel->getActiveSheet()->setCellValue('K' . $fila, 'Etapa');
        $sheet->getStyle('K' . $fila)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $sheet->getStyle('K' . $fila)->getFill()->getStartColor()->setRGB('DDD9D9');
        $objPHPExcel->getActiveSheet()->setCellValue('L' . $fila, 'Estado');
        $sheet->getStyle('L' . $fila)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $sheet->getStyle('L' . $fila)->getFill()->getStartColor()->setRGB('DDD9D9');

        $fila++;
        foreach ($model as $miniModel) {
            if ($miniModel != NULL) {
                $objPHPExcel->getActiveSheet()->setCellValue('A' . $fila, $miniModel->id_proyecto);
                $objPHPExcel->getActiveSheet()->setCellValue('B' . $fila, $miniModel->idPropuesta->titulo);
                $ins = "";
                foreach ($miniModel->idPropuesta->propuestaInscritas as $inscritos) {
                    $ins.= $inscritos->usuario0->nombre . " / ";
                }
                $objPHPExcel->getActiveSheet()->setCellValue('C' . $fila, $ins);
                $objPHPExcel->getActiveSheet()->setCellValue('D' . $fila, $miniModel->apoyo_disenador == '1' ? 'SI' : 'NO');
                $objPHPExcel->getActiveSheet()->setCellValue('E' . $fila, $miniModel->carta_compromiso == '1' ? 'SI' : 'NO');
                $objPHPExcel->getActiveSheet()->setCellValue('F' . $fila, $miniModel->profGuia->nombre);
                $objPHPExcel->getActiveSheet()->setCellValue('G' . $fila, $miniModel->profInformante ? $miniModel->profInformante->nombre : '');
                $objPHPExcel->getActiveSheet()->setCellValue('H' . $fila, $miniModel->profSala ? $miniModel->profSala->nombre : '');
                $objPHPExcel->getActiveSheet()->setCellValue('I' . $fila, $miniModel->fecha_inicio);
                $objPHPExcel->getActiveSheet()->setCellValue('J' . $fila, $miniModel->fecha_fin);
                $objPHPExcel->getActiveSheet()->setCellValue('K' . $fila, $miniModel->estadoAvance->nombre);
                $objPHPExcel->getActiveSheet()->setCellValue('L' . $fila, $miniModel->estadoActual->nombre);
                $fila++;
            }
        }

        $styleThinBlackBorderOutline = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('argb' => 'FF000000'),
                ),
            ),
        );
        $objPHPExcel->getActiveSheet()->getStyle('A1:L' . ($fila - 1))->applyFromArray($styleThinBlackBorderOutline);

        for ($j = 1; $j <= $fila; $j++) {
            $objPHPExcel->getActiveSheet()->getRowDimension($j)->setRowHeight(18);
        }
        for ($col = 'A'; $col != 'M'; $col++) {
            $objPHPExcel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
        }
        $objPHPExcel->setActiveSheetIndex(0);

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
        ob_end_clean();
        ob_start();
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="lista_proyecto_excel.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }

    public function actioncartaDeCompromiso($idp) {
        $model = $this->loadModel($idp);
        if ($model != NULL) {
            $encargado = EmpresaProyecto::model()->find('id_proyecto=' . $model->id_proyecto);
            $html2pdf = Yii::app()->ePdf->HTML2PDF();
            $html2pdf->setDefaultFont('helvetica');
            $html2pdf->WriteHTML($this->renderPartial('cartaCompromisoPDF', array('model' => $model, 'encargado' => $encargado), true));
            $html2pdf->Output('carta_compromiso.pdf', 'D');
        } else {
            // Yii::app()->user->setFlash('error', "El reporte no puede ser generado");
            // $this->actionView($id);
        }
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $model = $this->loadModel($id);
        foreach ($model->avances as $av) {
            $av->delete();
        }
        foreach ($model->correccions as $c) {
            $c->delete();
        }
        foreach ($model->planificacions as $p) {
            $p->delete();
        }
        $model->delete();
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $this->layout=NULL;
        $model = new Proyecto('search');
        // $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Proyecto'])) {
            $model->attributes = $_GET['Proyecto'];
        }

        $this->render('index', array(
            'model' => $model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $this->layout=NULL;
        $model = new Proyecto('search');
        // $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Proyecto'])) {
            $model->attributes = $_GET['Proyecto'];
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Proyecto the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Proyecto::model()->findByPk($id);
        if ($model != null) {
            if ($this->esPropietario($model)) {
                return $model;
            } else {
                throw new CHttpException(403, 'Ud. no está autorizado');
            }
        }
        else
            throw new CHttpException(404, 'La petición no existe');
    }

    public function gridEstadoActual($data, $row) {
        return Estado::model()->findByPk($data->estado_actual)->nombre;
    }

    public function gridProfesorGuia($data, $row) {
        return $data->prof_guia ? Usuario::model()->findByPk($data->prof_guia)->nombre : '';
    }

    public function gridProfesorInformante($data, $row) {
        return $data->prof_informante ? Usuario::model()->findByPk($data->prof_informante)->nombre : '';
    }

    public function gridTituloPropuesta($data, $row) {
        return substr($data->idPropuesta->titulo, 0, 60) . '...';
    }

    public function gridHistorialDeCambios($data) {
        $tabla = "<table>";
        // $tabla.="<tr>  <td>Rut</td> <td>Nombre</td> <td>Email</td> </tr>";
        $models = Proyecto::model()->findAll('id_proyecto_padre=:idp', array(':idp' => $data->id_proyecto));
        foreach ($models as $prop) {
            $tabla.="<tr> <td>" . CHtml::link($prop->fecha_creacion, array('view', 'id' => $prop->id_proyecto,)) . "</td> </tr>";
        }
        $tabla.="</table>";
        return $tabla;
    }

    public function gridProfesorSala($data, $row) {
        return $data->prof_sala ? Usuario::model()->findByPk($data->prof_sala)->nombre : '';
    }

    public function gridParticipantes($data) {
        $tabla = "<table>";
        $tabla.="<tr>  <td>Rut</td> <td>Nombre</td> <td>Email</td> </tr>";
        $model = Propuesta::model()->findByPk($data->id_propuesta);
        $propuestasInscritas = $model->propuestaInscritas;
        foreach ($propuestasInscritas as $prop) {
            $usuario = $prop->usuario0;
            $tabla.="<tr>  <td>" . $usuario->username . "</td> <td>" . $usuario->nombre . "</td> <td>" . $usuario->email . "</td> </tr>";
        }

        $tabla.="</table>";
        return $tabla;
    }

    public function gridParticipantesAdmin($data, $row) {
        $tabla = "<table>";
        //$tabla.="<tr>   <td>Nombre</td>  </tr>";
        $model = Propuesta::model()->findByPk($data->id_propuesta);
        $propuestasInscritas = $model->propuestaInscritas;
        foreach ($propuestasInscritas as $prop) {
            $usuario = $prop->usuario0;
            $tabla.="<tr> <td>" . $usuario->nombre . "</td> </tr>";
        }

        $tabla.="</table>";
        return $tabla;
    }

    public function gridEstadoAvance($data, $row) {
        return Estado::model()->findByPk($data->estado_avance)->nombre;
    }

    public function gridApoyoDesenador($data, $row) {
        return $data->apoyo_disenador == '1' ? 'SI' : $data->apoyo_disenador=='3'?'PARCIAL': 'NO';
    }
    public function gridApoyoFinanciado($data, $row) {
        return $data->financiado == '1' ? 'SI' : $data->financiado=='3'?'PARCIAL': 'NO';
    }
    /**
     * 
     * @param Proyecto $data
     * @param type $row
     * @return string
     */
    public function gridPeriodo($data, $row) {
        return $data->idPropuesta->idProceso->titulo;
    }

    public function gridCartaCompromsio($data, $row) {
        return $data->carta_compromiso == '1' ? 'SI' : 'NO';
    }

    /**
     * Performs the AJAX validation.
     * @param Proyecto $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'proyecto-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function SendMail($asunto, $mensaje, $para) {
        $message = new YiiMailMessage;
        $message->subject = $asunto ? $asunto : 'Asunto';
        $mensaje.="<br/>
            <br/>
            Cualquier consulta dirigirla a secretaría de carrera 
            (" . PeticionesWebService::obtieneCorreoSecretaria(Yii::app()->user->getState('campus')) . ")
            <br/>
            --
            <br/>Atte.<br/>Administrador de sistemas de Ingeniería Civil en 
            Informática UBB<br/>" . Yii::app()->getBaseUrl(true) . " <br/> 
             Éste correo no debe ser respondido.";
        $message->setBody($mensaje, 'text/html'); //codificar el html de la vista
        $message->from = (Yii::app()->params['adminEmail']); // alias del q envia
        $message->setTo($para); // a quien se le envia
        Yii::app()->mail->send($message);
    }

    private function esPropietario($model) {
        $propietario = FALSE;
        $propuesta = Propuesta::model()->findByPk($model->id_propuesta);
        if ($propuesta != null) {
            foreach ($propuesta->propuestaInscritas as $prop) {
                if ($prop->usuario == Yii::app()->user->id) {
                    $propietario = TRUE;
                    break;
                }
            }
            foreach ($propuesta->coGuia as $prop) {
                if ($prop->id_usuario == Yii::app()->user->id) {
                    $propietario = TRUE;
                    break;
                }
            }
            if ($propuesta->usuario_creador == Yii::app()->user->id) {
                $propietario = TRUE;
            }
            if ($propuesta->profesor_guia == Yii::app()->user->id) {
                $propietario = TRUE;
            }
            //la propuesta tiene proyecto
            if ($model != null) {

                if ($model->prof_guia == Yii::app()->user->id) {
                    $propietario = TRUE;
                }
                if ($model->prof_informante == Yii::app()->user->id) {
                    $propietario = TRUE;
                }
                if ($model->prof_sala == Yii::app()->user->id) {
                    $propietario = TRUE;
                }
            }
        }
        return Yii::app()->user->checkeaAccesoMasivo(array(Rol::$ADMINISTRADOR, Rol::$SUPER_USUARIO)) || $propietario;
    }

}
