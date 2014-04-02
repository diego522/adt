<?php

class PropuestaController extends Controller {

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
                'actions' => array('index', 'listaDisponibles', 'renuncia', 'inscribe', 'misPropuestas', 'enviaARevision', 'agregaParticipante', 'download',),
                'roles' => array(Rol::$SUPER_USUARIO, Rol::$ALUMNO, Rol::$ADMINISTRADOR, Rol::$PROFESOR,),
            ),
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('view', 'verPDF'),
                'roles' => array(Rol::$SUPER_USUARIO, Rol::$ALUMNO, Rol::$ADMINISTRADOR, Rol::$PROFESOR, Rol::$DISENADOR),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'roles' => array(Rol::$SUPER_USUARIO, Rol::$ALUMNO, Rol::$ADMINISTRADOR, Rol::$PROFESOR),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('delete', 'modificacionAdministrador', 'Desincribe', 'resolverSituacion', 'listaPDF', 'notificarResolucion'),
                'roles' => array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'excelConFiltros'),
                'roles' => array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR, Rol::$DISENADOR,),
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
                $nombre = str_replace(" ", "_", "ad_prop_" . $model->id_propuesta . "_" . "{$uploadedFileBN}");
                $rutaCarpeta = Yii::app()->basePath . Yii::app()->params['ruta_adjunto'] . Yii::app()->params['adjuntos_propuesta'] . "/" . $model->id_propuesta;
                if (!is_dir($rutaCarpeta)) {
                    mkdir($rutaCarpeta);
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

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
//ve para revisar antes de ser inscrita
        $model = $this->loadModel($id);
        if ($model->estado == Estado::$PROPUESTA_DISPONIBLE ||
                $model->estado == Estado::$PROPUESTA_PENDIENTE_DE_PUBLICACION) {
            $this->render('view', array(
                'model' => $model,
            ));
        } else {
            if ($model->estado == Estado::$PROPUESTA_ACEPTADA ||
                    $model->estado == Estado::$PROPUESTA_ACEPTADA_CON_OBSERVACIONES_CON_PRESENTACION ||
                    $model->estado == Estado::$PROPUESTA_ACEPTADA_CON_OBSERVACIONES_SIN_PRESENTACION ||
                    $model->estado == Estado::$PROPUESTA_BORRADOR ||
                    $model->estado == Estado::$PROPUESTA_MODIFICADA ||
                    $model->estado == 40 || //reformular
                    $model->estado == Estado::$PROPUESTA_PENDIENTE_DE_REVISION ||
                    $model->estado == Estado::$PROPUESTA_RECHAZADA) {
                $tabla = $this->gridParticipantes($model);
                $tablaHistorial = $this->gridHistorialDeCambios($model);
                $this->render('viewEjecucion', array(
                    'model' => $model,
                    'tabla' => $tabla,
                    'tablaCambios' => $tablaHistorial,
                ));
            } else {
                throw new CHttpException(500, 'No hay resultados');
            }
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Propuesta('create');
        $proceso = Proceso::obtieneProcesoActual();
        if (isset($_POST['Propuesta'])) {
            $model->attributes = $_POST['Propuesta'];
            $model->usuario_creador = Yii::app()->user->id;
            $model->id_proceso = $proceso->id_proceso;
            $model->id_campus = Yii::app()->user->getState('campus');
            if ($model->save()) {
                if (Yii::app()->user->checkeaAccesoMasivo(array(Rol::$ALUMNO,))) {
                    $model->estado = Estado::$PROPUESTA_DISPONIBLE;
                    $model->save();
//                    $this->SendMail('Creación de propuesta', '<h2>Creación de Propuesta de proyecto de titulación</h2>
//                                       Estimado(a) ' . Yii::app()->user->getState('nombre') . ', se ha creado correctamente su propuesta en el sistema.<br/>
//                                       Como alumno, la propuesta ya se encuentra disponible para ser completada', $usuario->email);
                    $this->actionInscribe($model->id_propuesta);
                } else {
//                    $this->SendMail('Creación de propuesta', '<h2>Creación de Propuesta de proyecto de titulación</h2>
//                                       Estimado(a) ' . Yii::app()->user->getState('nombre') . ', se ha creado correctamente su propuesta en el sistema.<br/>
//                                       El siguiente paso es que el administrador de el visto bueno para que pueda estar disponible para los alumnos', $usuario->email);
                }
                $this->redirect(array('view', 'id' => $model->id_propuesta));
            }
        }
        if ($proceso != NULL) {
            $this->render('crearPropuesta', array(
                'model' => $model,
            ));
        } else {
            throw new CHttpException(500, 'No existe un periodo (semestre) activo para ingresar nuevas propuestas');
        }
    }

    public function actionEnviaARevision($id) {
        $modelRevision = $this->loadModel($id);
        if ($modelRevision->idPropuestaPadre == NULL) {
            $modelRevision->scenario = 'revision';
            if ($modelRevision->estado == Estado::$PROPUESTA_BORRADOR) {
                if (isset($_POST['Propuesta'])) {
                    $modelRevision->attributes = $_POST['Propuesta'];
                    $modelRevision->adjunto = $this->loadModel($id)->adjunto;
                }
                if ($modelRevision != NULL) {
                    if ($modelRevision->validate()) {
//validar la cantidad de participantes
                        if (count($modelRevision->propuestaInscritas) != $modelRevision->cant_participantes) {
                            Yii::app()->user->setFlash('error', "La cantidad de participantes no corresponde a lo requerido (hay:" . count($modelRevision->propuestaInscritas) . " de:" . $modelRevision->cant_participantes . ")");
                            $tabla = $this->gridParticipantes($modelRevision);
                            $this->render('updateEjecucion', array(
                                'model' => $modelRevision, 'tabla' => $tabla,
                            ));
                        } else {
//cambia a pendiente de revisión la propuesta
                            $modelRevision->estado = Estado::$PROPUESTA_PENDIENTE_DE_REVISION;
                            $modelRevision->fecha_presenta_propuesta = Yii::app()->dateFormatter->format("dd/MM/y", strtotime(date('Y-m-d')));

                            if ($modelRevision->save()) {
                                $this->actionUploadFile($modelRevision);
                                Yii::app()->user->setFlash('success', "La propuesta se ha enviado para revisión de manera correcta");
                                foreach ($modelRevision->propuestaInscritas as $pro) {
                                    $this->SendMail('Propuesta a revisión', '<h2>Propuesta enviada a revisión</h2>
                                       Estimado(a) ' . $pro->usuario0->nombre . ', se ha enviado correctamente su propuesta para ser sometida a revisión por el comité de carrera.<br/>
                                       El siguiente paso es esperar que se le notifique la resolución vía este medio del resultado.', $pro->usuario0->email);
                                }
                                $this->redirect(array('view',
                                    'id' => $id));
                            }
                        }
                    } else {
                        Yii::app()->user->setFlash('error', "La propuesta no puede ser enviada hasta que complete correctamente los siguientes campos");
                        $this->render('updateEjecucion', array(
                            'model' => $modelRevision,
                        ));
                    }
                } else {
                    throw new CHttpException(404, 'Problemas al traer los datos');
                }
            } else {
                Yii::app()->user->setFlash('notice', "La propuesta no puede ser enviada a revisión porque se encuentra en estado " . $modelRevision->estado0->nombre);
                $this->redirect(array('view',
                    'id' => $id));
            }
        } else {
            throw new CHttpException(500, 'La propuesta pertenece al historial, no puede ser revisada');
        }
    }

    public function actionNotificarResolucion($id) {
        if (isset($_POST['Propuesta'])) {
            $modelRevision = $this->loadModel($id);
            if ($modelRevision->idPropuestaPadre == NULL) {
                $modelRevision->scenario = 'resolucion';
                $modelRevision->attributes = $_POST['Propuesta'];
                if (trim($modelRevision->fecha_presentacion) == '') {
                    $modelRevision->fecha_presentacion = NULL;
                }
                if ($modelRevision->validate()) {
                    $modelRevision->fecha_resolucion = Yii::app()->dateFormatter->format("dd/MM/y", strtotime(date('Y-m-d')));
                    if ($modelRevision->save()) {
                        //eliminar los co guia y re guardar

                        $modelRevision = $this->loadModel($id);
                        foreach ($modelRevision->coGuia as $co_g) {
                            Yii::app()->db->createCommand('DELETE FROM co_guia WHERE id_co_guia = ' . $co_g->id_usuario . ' AND id_propuesta = ' . $modelRevision->id_propuesta)->execute();
                        }
                        if (isset($_POST['rightValues'])) {
                            foreach ($_POST['rightValues'] as $co_guia) {
                                $coGuia = new CoGuia();
                                $coGuia->id_propuesta = $modelRevision->id_propuesta;
                                $coGuia->id_co_guia = $co_guia;
                                $coGuia->save();
                            }
                        }
//se ha aceptado la propuesta, verificar que, sino hay proyecto crea uno
                        $proyecto = new Proyecto;
                        $proyectoAux = Proyecto::model()->find('id_propuesta=' . $modelRevision->id_propuesta);
                        if ($proyectoAux == NULL && $modelRevision->estadoDeAceptacionTotal()) {
//se autoriza a crear un proyecto
                            $proceso = Proceso::model()->findByPk($modelRevision->id_proceso);
                            $proyecto->estado_actual = Estado::$PROYECTO_EN_DESARROLLO;
                            $proyecto->fecha_creacion = Yii::app()->dateFormatter->format("dd/MM/y", strtotime(date('Y-m-d')));
                            $proyecto->fecha_inicio = Yii::app()->dateFormatter->format("dd/MM/y", strtotime(date('Y-m-d')));
                            $proyecto->fecha_fin = $proceso->fecha_fin_proyecto;
                            $proyecto->id_propuesta = $modelRevision->id_propuesta;
                            $proyecto->prof_guia = $modelRevision->profesor_guia;
                            if ($proyecto->save()) {
                                Yii::app()->user->setFlash('success', "Se ha creado el proyecto correctamente");
                                foreach ($modelRevision->propuestaInscritas as $pro) {
                                    $this->SendMail('Creación de proyecto', '<h2>Nuevo proyecto</h2>
                                       Estimado(a) ' . $pro->usuario0->nombre . ', su propuesta ha sido ' . $modelRevision->estado0->nombre . '.<br/>
                                       Lo que significa que puede iniciar su proyecto desde este momento y contactar a su profesor guía, el profesor ' . $modelRevision->profesorGuia->nombre . '. El sistema le ha creado un espacio para este proyecto en el cual ud. podrá registrar su planificación, subir avances t obtener correcciones. Esperando que tenga éxito en su Actividad de Titulación le saluda cordialmente.', $pro->usuario0->email);
                                }
                                if ($modelRevision->profesorGuia) {
                                    $this->SendMail('Creación de proyecto', '<h2>Nuevo proyecto</h2>
                                       Estimado(a) ' . $modelRevision->profesorGuia->nombre . ', Ud. ha sido ingresado como profesor guía para el proyecto de titulación "' . $modelRevision->titulo . '". Para más detalles se le ruega visite el sistema
                                       de la carrera sección Proyectos > Mis Proyectos.', $modelRevision->profesorGuia->email);
                                }
                                $this->redirect(array('proyecto/view', 'id' => $proyecto->id_proyecto));
                            } else {
                                Yii::app()->user->setFlash('error', "Problemas al crear el proyecto");
                                $this->redirect(array('view', 'id' => $id));
                            }
                        } else {
                            Yii::app()->user->setFlash('success', "La propuesta se ha actualizado correctamente ");
                            foreach ($modelRevision->propuestaInscritas as $pro) {
                                $this->SendMail('Resolución de propuesta', '<h2>Resolución de propuesta</h2>
                                       Estimado(a) ' . $pro->usuario0->nombre . ', su propuesta ha sido ' . $modelRevision->estado0->nombre . '.<br/>
                                       Para mas detalles visite el portal de actividad de titulación de nuestra carrera.', $pro->usuario0->email);
                            }
                            $this->redirect(array('view', 'id' => $id));
                        }

                        foreach ($modelRevision->propuestaInscritas as $pro) {
                            $this->SendMail('Resolución de propuesta', '<h2>Resolución</h2>
                                       Estimado(a) ' . $pro->usuario0->nombre . ', su propuesta ha sido ' . $modelRevision->estado0->nombre . '.<br/>
                                       Para mas detalles visite el portal de actividad de titulación de nuestra carrera.', $pro->usuario0->email);
                        }
                        $this->redirect(array('view', 'id' => $id));
                    } else {
                        Yii::app()->user->setFlash('error', "Problemas al guardar los datos");
                    }
                } else {
                    $tabla = $this->gridParticipantes($modelRevision);
                    $this->render('updateResolucion', array('model' => $modelRevision, 'tabla' => $tabla));
                }
            } else {
                throw new CHttpException(500, 'La propuesta pertenece al historial, no puede ser notificada');
            }
        } else {
            $this->redirect(array('view', 'id' => $id));
        }
    }

    public function actionResolverSituacion($id) {
//$modelRevision = new Propuesta;
        $modelRevision = $this->loadModel($id);

        if ($modelRevision->idPropuestaPadre == NULL) {
            $tabla = $this->gridParticipantes($modelRevision);
            //$this->performAjaxValidation($modelRevision);
            //echo var_dump($_POST['Propuesta']);
            if (isset($_POST['Propuesta'])) {
                // var_dump($_POST['rightValues']);
                $modelRevision->attributes = $_POST['Propuesta'];
                if (trim($modelRevision->fecha_presentacion) == '') {
                    $modelRevision->fecha_presentacion = NULL;
                }
                foreach ($modelRevision->coGuia as $co_g) {
                    Yii::app()->db->createCommand('DELETE FROM co_guia WHERE id_co_guia = ' . $co_g->id_usuario . ' AND id_propuesta = ' . $modelRevision->id_propuesta)->execute();
                }
                if (isset($_POST['rightValues'])) {
                    foreach ($_POST['rightValues'] as $co_guia) {
                        $coGuia = new CoGuia();
                        $coGuia->id_propuesta = $modelRevision->id_propuesta;
                        $coGuia->id_co_guia = $co_guia;
                        $coGuia->save();
                    }
                }
                if ($modelRevision->save()) {
                    $this->redirect(array('view', 'id' => $id));
                } else {
                    Yii::app()->user->setFlash('error', "Problemas al guardar los datos");
                    $this->render('updateResolucion', array('model' => $modelRevision, 'tabla' => $tabla));
                }
            } else
                $this->render('updateResolucion', array('model' => $modelRevision, 'tabla' => $tabla));
        } else {
            throw new CHttpException(500, 'La propuesta pertenece al historial, no puede ser modificada');
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        if ($model->estado == Estado::$PROPUESTA_DISPONIBLE || $model->estado == Estado::$PROPUESTA_PENDIENTE_DE_PUBLICACION)
            $model->scenario = 'modifica';
        else
            $model->scenario = '';
        $this->performAjaxValidation($model);

        if (isset($_POST['Propuesta'])) {
            $model->attributes = $_POST['Propuesta'];
            $model->adjunto = $this->loadModel($id)->adjunto;
            if ($model->save()) {
                $this->actionUploadFile($model);
                $this->redirect(array('view', 'id' => $model->id_propuesta));
            }
        }
        if ($model->idPropuestaPadre == NULL) {
            if ($model->estado == Estado::$PROPUESTA_DISPONIBLE ||
                    $model->estado == Estado::$PROPUESTA_PENDIENTE_DE_PUBLICACION) {
                $this->render('update', array(
                    'model' => $model,
                ));
            } else {
                if ($model->estado == Estado::$PROPUESTA_ACEPTADA ||
                        $model->estado == Estado::$PROPUESTA_ACEPTADA_CON_OBSERVACIONES_CON_PRESENTACION ||
                        $model->estado == Estado::$PROPUESTA_ACEPTADA_CON_OBSERVACIONES_SIN_PRESENTACION ||
                        $model->estado == Estado::$PROPUESTA_BORRADOR
                ) {
                    $tabla = $this->gridParticipantes($model);
                    $this->render('updateEjecucion', array(
                        'model' => $model, 'tabla' => $tabla,
                    ));
                } else {
                    if ($model->estado == Estado::$PROPUESTA_MODIFICADA || $model->estado == Estado::$PROPUESTA_PENDIENTE_DE_REVISION || $model->estado == Estado::$PROPUESTA_RECHAZADA)
                        throw new CHttpException(500, 'La propuesta está en un estado que no puede ser modificada');
                }
            }
        }else {
            throw new CHttpException(500, 'La propuesta pertenece al historial, no puede ser modificada');
        }
    }

    public function actionVerPDF($id) {
//traer a los participantes
        $model = $this->loadModel($id);
        if ($model != NULL) {
            $html2pdf = Yii::app()->ePdf->HTML2PDF();
            $html2pdf->setDefaultFont('helvetica');
            $html2pdf->WriteHTML($this->renderPartial('propuestaPDF', array('model' => $model,), true));
            if ($model->adjunto0 != NULL && strpos($model->adjunto0->filecontenttype, 'pdf') !== FALSE) {
                try {
                    $html2pdf->Output(Yii::app()->basePath . Yii::app()->params['ruta_adjunto'] . '/temporal_propuesta_' . $model->id_propuesta . '.pdf', 'F');
                    $mpdf = Yii::app()->ePdf->mpdf();
                    $mpdf->SetImportUse();
                    $ow = $mpdf->h;
                    $oh = $mpdf->w;
                    $pw = $mpdf->w / 2;
                    $ph = $mpdf->h;
                    $mpdf->SetDisplayMode('fullpage');
                    $pagecount = $mpdf->SetSourceFile(Yii::app()->basePath . Yii::app()->params['ruta_adjunto'] . '/temporal_propuesta_' . $model->id_propuesta . '.pdf');
                    for ($i = 0; $i < $pagecount; $i++) {
                        $mpdf->AddPage();
                        $tplidx = $mpdf->importPage($i + 1, '/MediaBox');
                        $mpdf->useTemplate($tplidx, 10, 10, 200);
                    }
                    $pagecount2 = $mpdf->SetSourceFile($model->adjunto0->ruta);
                    for ($i = 0; $i < $pagecount2; $i++) {
                        $mpdf->AddPage();
                        $tplidx = $mpdf->importPage($i + 1, '/MediaBox');
                        $mpdf->useTemplate($tplidx, 10, 10, 200);
                    }
                    unlink(Yii::app()->basePath . Yii::app()->params['ruta_adjunto'] . '/temporal_propuesta_' . $model->id_propuesta . '.pdf');
                    $mpdf->Output('propuesta_' . $model->id_propuesta . '.pdf', 'D');
                } catch (Exception $e) {
                    $html2pdf->Output('propuesta_' . $model->id_propuesta . '.pdf', 'D');
                }
            } else {
                $html2pdf->Output('propuesta_' . $model->id_propuesta . '.pdf', 'D');
            }
        } else {
            Yii::app()->user->setFlash('error', "El reporte no puede ser generado");
            $this->actionView($id);
        }
    }

    public function actionDownload($id) {
        $adjuntoModel = Adjunto::model()->findByPk($id);
        if ($adjuntoModel != null)
            Yii::app()->request->sendFile($adjuntoModel->filename, file_get_contents($adjuntoModel->ruta), $adjuntoModel->filecontenttype);
        else
            $this->actionView($id);
    }

    public function actionModificacionAdministrador($id) {
        $model = $this->loadModel($id);
// Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);
        if (isset($_POST['Propuesta'])) {
            $model->attributes = $_POST['Propuesta'];
            if ($model->save()) {
                $this->actionUploadFile($model);
                $this->redirect(array('view', 'id' => $model->id_propuesta));
            }
        }
        $this->render('updateAdministrador', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $model = $this->loadModel($id);
        $model->delete();
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    public function actionRenuncia($id) {
        $id_usuario = Yii::app()->user->id;
        $usuario = Usuario::model()->findByPk($id_usuario);
        $model = $this->loadModel($id);
        $propietario = false;
        foreach ($model->propuestaInscritas as $prop) {
            if ($prop->usuario == Yii::app()->user->id) {
                $propietario = TRUE;
                break;
            }
        }
        if ($propietario) {
            $command = Yii::app()->db->createCommand("CALL renuncia_propuesta(:id_prop,:id_usuario)");
            $command->bindParam(":id_prop", $id, PDO::PARAM_INT);
            $command->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
            $command->execute();
            foreach ($model->propuestaInscritas as $pro) {
                $this->SendMail('Renuncia de propuesta', '<h2>Renuncia de propuesta</h2>
                                       Estimado(a) ' . $usuario->nombre . ', este correo le confirma la correcta reuncia a la propuesta.', $pro->usuario0->email);
            }
            $this->redirect(array('misPropuestas'));
        } else {
            throw new CHttpException(403, 'Ud. no puede renunciar, no pertenece a esta propuesta.');
        }
    }

    public function actionDesincribe($id_u, $id_p) {
        $model = $this->loadModel($id_p);
        $propietario = false;
        foreach ($model->propuestaInscritas as $prop) {
            if ($prop->usuario == $id_u) {
                $propietario = TRUE;
                break;
            }
        }
        if ($propietario) {
            $command = Yii::app()->db->createCommand("CALL renuncia_propuesta(:id_prop,:id_usuario)");
            $command->bindParam(":id_prop", $id_p, PDO::PARAM_INT);
            $command->bindParam(":id_usuario", $id_u, PDO::PARAM_INT);
            $command->execute();
            Yii::app()->user->setFlash('success', "La propuesta ha sido desincrita correctamente");
            $this->redirect(array('admin'));
        } else {
            throw new CHttpException(403, 'Ud. no puede desincribir esta propuesta.');
        }
    }

    public function actionAgregaParticipante($id) {
        $model = new AgregaParticipante;
        $model->id_propuesta = $id;
// $this->performAjaxValidation($model);
        if (isset($_POST['AgregaParticipante'])) {
            $model->attributes = $_POST['AgregaParticipante'];
            if ($model->validate()) {
                $rut = str_replace('.', '', $model->rut);
                $arreglo = explode('-', $rut);
                $rutParticipante = $arreglo[0];
                PeticionesWebService::traeUsuarioDesdeSI($rutParticipante, $arreglo[1]);
                $propuesta = Propuesta::model()->findByPk($id);
                if ($propuesta->estado == Estado::$PROPUESTA_BORRADOR) {
                    if ($propuesta->cant_participantes > count($propuesta->propuestaInscritas)) {
                        $usuario = Usuario::model()->find('username=' . $rutParticipante);
                        $proceso = Proceso::model()->findBYPk($propuesta->id_proceso);
                        if ($model != NULL && $usuario != NULL) {
                            if ($proceso != NULL) {
                                $proceso->id_proceso;
                                $id_usuario = (int) $usuario->id_usuario;
                                $command = Yii::app()->db->createCommand("CALL inscribe_propuesta(:id_usuario,:id_prop,@out)");
                                $command->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
                                $command->bindParam(":id_prop", $id, PDO::PARAM_INT);
                                $command->execute();
                                $valueOut = Yii::app()->db->createCommand("select @out as result;")->queryScalar();
                                if ($valueOut != NULL) {
                                    if ($valueOut > 0) {
                                        Yii::app()->user->setFlash('success', "Participante agregado correctamente");
                                        $propuesta = Propuesta::model()->findByPk($id);
                                        foreach ($propuesta->propuestaInscritas as $pro) {
                                            $this->SendMail('Propuesta inscrita', '<h2>Propuesta Inscrita</h2>
                                       Estimado(a) ' . $pro->usuario0->nombre . ', este correo le confirma la correcta inscripción de la propuesta.<br/>
                                           Ahora ya puede comenzar a completarla en la sección Propuestas>Mis Propuestas>Ver>Completar Propuesta. <br/>
                                           Cuando esté lista, debe terminar el proceso enviandola a revisión.
                                           ', $pro->usuario0->email);
                                        }
                                        $this->redirect(array('view', 'id' => $model->id_propuesta));
                                        return;
                                    } else {
                                        Yii::app()->user->setFlash('error', "Este participante. ya posee una propuesta inscrita");
                                    }
                                } else {
                                    throw new CHttpException(500, 'La inscripción no ha podido ejecutarse, si el problema persiste, contacte al administrador');
                                }
                            } else {
                                throw new CHttpException(500, 'Proceso de postulación cerrado');
                            }
                        } else {
                            throw new CHttpException(500, 'Problema al traer los datos');
                        }
                    } else {
                        Yii::app()->user->setFlash('error', "Se ha alcanzado la cantidad límite de participantes");
                    }
                } else {
                    throw new CHttpException(500, 'No se puede agregar al participante porque la propuesta está en un estado que no lo permite');
                }
                $this->redirect(array('view', 'id' => $model->id_propuesta));
                return;
            } else {
                Yii::app()->user->setFlash('error', "Datos incorrectos");
                $this->redirect(array('view', 'id' => $model->id_propuesta));
            }
        } else {
            $this->renderPartial('agrega', array('model' => $model,), false, true);
        }
//       
    }

    public function actionInscribe($id) {
        $model = $this->loadModel($id);
        if ($model->idPropuestaPadre == NULL) {
            $usuario = Usuario::model()->findBYPk(Yii::app()->user->id);
            $proceso = Proceso::obtieneProcesoActual();
            if ($model != NULL && $usuario != NULL) {
                if ($proceso != NULL) {
                    $proceso->id_proceso;
                    $id_usuario = (int) $usuario->id_usuario;
                    $command = Yii::app()->db->createCommand("CALL inscribe_propuesta(:id_usuario,:id_prop,@out)");
                    $command->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
                    $command->bindParam(":id_prop", $id, PDO::PARAM_INT);
                    $command->execute();
                    $valueOut = Yii::app()->db->createCommand("select @out as result;")->queryScalar();
                    if ($valueOut != NULL) {
                        if ($valueOut > 0) {
//inserción correcta
                            Yii::app()->user->setFlash('success', "Propuesta inscrita correctamente");
                            foreach ($model->propuestaInscritas as $pro) {
                                $this->SendMail('Propuesta inscrita', '<h2>Propuesta Inscrita</h2>
                                       Estimado(a) ' . $pro->usuario0->nombre . ', este correo le confirma la correcta inscripción de la propuesta.<br/>
                                           Ahora ya puede comenzar a completarla en la sección Propuestas>Mis Propuestas>Ver>Completar Propuesta. <br/>
                                           Cuando esté lista, debe terminar el proceso enviandola a revisión.', $pro->usuario0->email);
                            }
                            $this->redirect(array('view', 'id' => $model->id_propuesta));
                            return;
                        } else {
                            Yii::app()->user->setFlash('error', "Ud. ya posee una propuesta inscrita");
                        }
                    } else {
                        throw new CHttpException(500, 'La inscripción no ha podido ejecutarse, si el problema persiste, contacte al administrador');
                    }
                } else {
                    throw new CHttpException(500, 'Proceso de postulación cerrado');
                }
            } else {
                throw new CHttpException(500, 'Problema al traer los datos');
            }
            $this->redirect(array('view', 'id' => $model->id_propuesta));
            return;
        } else {
            throw new CHttpException(500, 'La propuesta pertenece al historial, no puede ser inscrita');
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $procesoVigente = Proceso::obtieneProcesoActual();
        if ($procesoVigente) {
            $condicion = 'id_propuesta_padre IS NULL and id_proceso=' . $procesoVigente->primaryKey . ' and estado=' . Estado::$PROPUESTA_DISPONIBLE . ' and id_campus=' . Yii::app()->user->getState('campus');
        } else
            $condicion = 'id_propuesta_padre IS NULL and id_proceso=0';
        $dataProvider = new CActiveDataProvider('Propuesta', array('criteria' => array('condition' => $condicion)));
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionMisPropuestas() {
        $this->layout = NULL;
        $model = new Propuesta('search');
        if (isset($_GET['Propuesta']))
            $model->attributes = $_GET['Propuesta'];
        $this->render('misPropuestas', array(
            'model' => $model,
        ));
    }

    public function actionListaDisponibles() {
        $procesoVigente = Proceso::obtieneProcesoActual();
        if ($procesoVigente) {
            $condicion = 'id_propuesta_padre IS NULL and id_proceso=' . $procesoVigente->primaryKey . ' and estado=' . Estado::$PROPUESTA_DISPONIBLE . ' and id_campus=' . Yii::app()->user->getState('campus');
        } else
            $condicion = 'id_propuesta_padre IS NULL and id_proceso=0';
        $dataProvider = new CActiveDataProvider('Propuesta', array('criteria' => array('condition' => $condicion)));
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $this->layout = NULL;
        $model = new Propuesta('search');
        if (isset($_GET['Propuesta']))
            $model->attributes = $_GET['Propuesta'];
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionListaPDF() {
        $session = new CHttpSession;
        $session->open();
        if (isset($session['resultado_filtro_propuesta']))
            $model = Propuesta::model()->findAll($session['resultado_filtro_propuesta']);
        else
            $model = Propuesta::model()->findAll();
        if ($model != NULL) {
            $html2pdf = Yii::app()->ePdf->HTML2PDF();
            $html2pdf->setDefaultFont('helvetica');
            $html2pdf->WriteHTML($this->renderPartial('reporteListaPropuestas', array('model' => $model,), true));
            $html2pdf->Output('lista_de_propuestas.pdf', 'D');
        } else {
            // Yii::app()->user->setFlash('error', "El reporte no puede ser generado");
            // $this->actionView($id);
        }
    }

    public function actionExcelConFiltros() {
        $session = new CHttpSession;
        $session->open();
        if (isset($session['resultado_filtro_propuesta']))
            $model = Propuesta::model()->findAll($session['resultado_filtro_propuesta']);
        else
            $model = Propuesta::model()->findAll();

        $fila = 1;
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

        $objPHPExcel->getActiveSheet()->setCellValue('A' . $fila, 'LISTA DE PROPUESTAS - Generado el ' . date('d/m/Y H:i'));
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
        $objPHPExcel->getActiveSheet()->setCellValue('C' . $fila, 'Creador');
        $sheet->getStyle('C' . $fila)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $sheet->getStyle('C' . $fila)->getFill()->getStartColor()->setRGB('DDD9D9');
        $objPHPExcel->getActiveSheet()->setCellValue('D' . $fila, 'Prof. Guía');
        $sheet->getStyle('D' . $fila)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $sheet->getStyle('D' . $fila)->getFill()->getStartColor()->setRGB('DDD9D9');
        $objPHPExcel->getActiveSheet()->setCellValue('E' . $fila, 'Integrantes');
        $sheet->getStyle('E' . $fila)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $sheet->getStyle('E' . $fila)->getFill()->getStartColor()->setRGB('DDD9D9');
        $objPHPExcel->getActiveSheet()->setCellValue('F' . $fila, 'Fecha envío');
        $sheet->getStyle('F' . $fila)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $sheet->getStyle('F' . $fila)->getFill()->getStartColor()->setRGB('DDD9D9');
        $objPHPExcel->getActiveSheet()->setCellValue('G' . $fila, 'Fecha resolución');
        $sheet->getStyle('G' . $fila)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $sheet->getStyle('G' . $fila)->getFill()->getStartColor()->setRGB('DDD9D9');
        $objPHPExcel->getActiveSheet()->setCellValue('H' . $fila, 'Estado');
        $sheet->getStyle('H' . $fila)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $sheet->getStyle('H' . $fila)->getFill()->getStartColor()->setRGB('DDD9D9');

        $fila++;
        foreach ($model as $miniModel) {
            if ($miniModel != NULL) {
                $objPHPExcel->getActiveSheet()->setCellValue('A' . $fila, $miniModel->id_propuesta);
                $objPHPExcel->getActiveSheet()->setCellValue('B' . $fila, $miniModel->titulo);
                $objPHPExcel->getActiveSheet()->setCellValue('C' . $fila, $miniModel->usuarioCreador->nombre);
                $objPHPExcel->getActiveSheet()->setCellValue('D' . $fila, $miniModel->profesorGuia ? $miniModel->profesorGuia->nombre : '');
                $ins = "";
                foreach ($miniModel->propuestaInscritas as $inscritos) {
                    $ins.= $inscritos->usuario0->nombre . " / ";
                }
                $objPHPExcel->getActiveSheet()->setCellValue('E' . $fila, $ins);
                $objPHPExcel->getActiveSheet()->setCellValue('F' . $fila, $miniModel->fecha_presenta_propuesta);
                $objPHPExcel->getActiveSheet()->setCellValue('G' . $fila, $miniModel->fecha_resolucion);
                $objPHPExcel->getActiveSheet()->setCellValue('H' . $fila, $miniModel->estado0->nombre);
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
        $objPHPExcel->getActiveSheet()->getStyle('A1:H' . ($fila - 1))->applyFromArray($styleThinBlackBorderOutline);

        for ($j = 1; $j <= $fila; $j++) {
            $objPHPExcel->getActiveSheet()->getRowDimension($j)->setRowHeight(18);
        }
        for ($col = 'A'; $col != 'I'; $col++) {
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
        ob_end_clean();
        ob_start();
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="lista_propuesta_excel.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Propuesta the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Propuesta::model()->findByPk($id);
        if ($model != null) {
            if ($model->estado != Estado::$PROPUESTA_DISPONIBLE && !$this->esPropietario($model)) {
                throw new CHttpException(403, ' Ud no está autorizado');
            }
        } else
            throw new CHttpException(404, 'La petición no existe.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Propuesta $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'propuesta-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function gridCreador($data, $row) {
        return Usuario::model()->findByPk($data->usuario_creador)->nombre;
    }

    public function gridProceso($data, $row) {
        return Proceso::model()->findByPk($data->id_proceso)->titulo;
    }

    public function gridParticipantes($data) {
        $tabla = "<table>";
        $tabla.="<tr> <td>Rut</td> <td>Nombre</td> <td>Email</td> <td>Desincribir</td></tr>";
        $model = $this->loadModel($data->id_propuesta);
        $propuestasInscritas = $model->propuestaInscritas;
        foreach ($propuestasInscritas as $prop) {
            $usuario = $prop->usuario0;
            $tabla.="<tr> <td>" . $usuario->username . "</td> 
                          <td>" . $usuario->nombre . "</td> 
                          <td>" . $usuario->email . "</td>
                          <td>" . CHtml::link('Desincribir propuesta', array('desincribe', 'id_p' => $data->id_propuesta, 'id_u' => $usuario->id_usuario)) . "</td>
                    </tr>";
        }

        $tabla.="</table>";
        return $tabla;
    }

    public function gridHistorialDeCambios($data) {
        $tabla = "<table>";
        // $tabla.="<tr> <td>Rut</td> <td>Nombre</td> <td>Email</td> </tr>";
        $models = Propuesta::model()->findAll('id_propuesta_padre=:idp', array(':idp' => $data->id_propuesta));
        foreach ($models as $prop) {
            $tabla.="<tr> <td>" . CHtml::link($prop->fecha_creacion, array('view', 'id' => $prop->id_propuesta,)) . "</td> </tr>";
        }

        $tabla.="</table>";
        return $tabla;
    }

    public function gridParticipantesAdmin($data, $row) {
        $tabla = "<table>";
        $tabla.="<tr><td>Nombre</td> </tr>";
        $model = $this->loadModel($data->id_propuesta);
        $propuestasInscritas = $model->propuestaInscritas;
        foreach ($propuestasInscritas as $prop) {
            $usuario = $prop->usuario0;
            $tabla.="<tr> <td>" . $usuario->nombre . "</td></tr>";
        }

        $tabla.="</table>";
        return $tabla;
    }

    public function gridEstado($data, $row) {


        return Estado::model()->findByPk($data->estado)->nombre;

        //return '<img align="middle" title="'.$data->estado0->nombre.'" src="' . Yii::app()->request->baseUrl . '/images/inc_est_propuesta/'.$data->estado.'.png"/>';
    }

    /**
     * 
     * @param Propuesta $model
     * @return boolean
     */
    private function esPropietario($model) {

        $propietario = FALSE;
        if ($model != null) {
            foreach ($model->propuestaInscritas as $prop) {
                if ($prop->usuario == Yii::app()->user->id) {
                    $propietario = TRUE;
                    break;
                }
            }
            foreach ($model->coGuia as $co_g) {
                if ($co_g->id_usuario == Yii::app()->user->id) {
                    $propietario = TRUE;
                    break;
                }
            }
            if ($model->usuario_creador == Yii::app()->user->id) {
                $propietario = TRUE;
            }
            if ($model->profesor_guia == Yii::app()->user->id) {
                $propietario = TRUE;
            }
            //la propuesta tiene proyecto
            $proyectos=  Proyecto::model()->find('id_proyecto_padre is NULL and id_propuesta='.$model->id_propuesta);
            if ($proyectos!=NULL) {

                if ($proyectos->prof_guia == Yii::app()->user->id) {
                    $propietario = TRUE;
                }
                if ($proyectos->prof_informante == Yii::app()->user->id) {
                    $propietario = TRUE;
                }
                if ($proyectos->prof_sala == Yii::app()->user->id) {
                    $propietario = TRUE;
                }
            }
        }
        return $propietario || Yii::app()->user->checkeaAccesoMasivo(array(Rol::$ADMINISTRADOR, Rol::$SUPER_USUARIO, Rol::$DISENADOR));
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
