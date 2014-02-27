<?php

class EvaluacionProyectoGuiaController extends Controller {

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
                'actions' => array('view', 'VerPDF', 'calculaNota'),
                'roles' => array(Rol::$SUPER_USUARIO, Rol::$ALUMNO, Rol::$ADMINISTRADOR, Rol::$PROFESOR),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'createYRevision', 'updateYRevision'),
                'roles' => array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR, Rol::$PROFESOR),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'index'),
                'roles' => array(Rol::$SUPER_USUARIO,),
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

    public function actionVerPDF($id) {
//traer a los participantes
        $model = $this->loadModel($id);
        if ($model != NULL) {
            $html2pdf = Yii::app()->ePdf->HTML2PDF();
            $html2pdf->setDefaultFont('helvetica');
            $html2pdf->WriteHTML($this->renderPartial('evaluacionPDF', array('model' => $model,), true));
            $html2pdf->Output('evaluacion_proyecto_guia_' . $model->idAlumno->nombre . '.pdf', 'D');
        } else {
            Yii::app()->user->setFlash('error', "El reporte no puede ser generado");
            $this->actionView($id);
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($ida, $idp) {
        $model = new EvaluacionProyectoGuia;
        $model->id_alumno = $ida;
        $model->id_proyecto = $idp;
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);
        $modelProyecto = Proyecto::model()->findByPk($idp);
        if ($modelProyecto != NULL && ($modelProyecto->estado_actual == Estado::$PROYECTO_EN_DESARROLLO || Yii::app()->user->checkeaAccesoMasivo(array(Rol::$ADMINISTRADOR, Rol::$SUPER_USUARIO)))) {
            if (isset($_POST['EvaluacionProyectoGuia'])) {
                $model->attributes = $_POST['EvaluacionProyectoGuia'];
                $model->estado = Estado::$EVALUACION_PENDIENTE_DE_ENVIO;
                if ($model->save()) {
                    Yii::app()->user->setFlash('success', "Evaluación guardada correctamente");
                    $this->redirect(array('proyecto/view', 'id' => $model->id_proyecto));
                }
            }
            $this->renderPartial('create', array(
                'model' => $model,
                    ), false, true);
        } else {
            $this->renderPartial('error', array('mensaje' => 'El proyecto no se encuentra disponible para modificaciones.',), FALSE, true);
        }
    }

    public function actionCreateYRevision($ida, $idp) {
        $model = new EvaluacionProyectoGuia;
        $model->scenario = "envia";
        $model->id_alumno = $ida;
        $model->id_proyecto = $idp;
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);
        $modelProyecto = Proyecto::model()->findByPk($idp);
        if ($modelProyecto != NULL && ($modelProyecto->estado_actual == Estado::$PROYECTO_EN_DESARROLLO || Yii::app()->user->checkeaAccesoMasivo(array(Rol::$ADMINISTRADOR, Rol::$SUPER_USUARIO)))) {
            if (isset($_POST['EvaluacionProyectoGuia'])) {
                $model->attributes = $_POST['EvaluacionProyectoGuia'];
                $model->estado = Estado::$EVALUACION_ENVIADA;
                if ($model->evaluacionCompleta()) {
                    if ($model->save()) {
                        Yii::app()->user->setFlash('success', "Evaluación guardada y enviada correctamente");
                        $this->redirect(array('proyecto/view', 'id' => $model->id_proyecto));
                    }
                } else {
                    Yii::app()->user->setFlash('error', "La evaluación en el <b>desarrollo del proyecto por el profesor Guía</b> no está completa, favor de completar y luego enviar.");
                    $this->redirect(array('proyecto/view', 'id' => $model->id_proyecto));
                }
            }
            $this->render('create', array(
                'model' => $model,
            ));
        } else {
            $this->render('error', array('mensaje' => 'El proyecto no se encuentra disponible para modificaciones.',));
        }
    }

    public function actionCalculaNota() {
        $model = new EvaluacionProyectoGuia;
        if (isset($_GET['EvaluacionProyectoGuia'])) {
            $model->attributes = $_GET['EvaluacionProyectoGuia'];
            echo $model->obtienePromedio();
            ;
        }
        else
            echo "0";
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $model->scenario = "envia";
        $this->performAjaxValidation($model);
        if ($model->id_evaluacion_proyecto_guia_padre == NULL) {
            // Uncomment the following line if AJAX validation is needed
            $modelProyecto = Proyecto::model()->findByPk($model->id_proyecto);
            if ($modelProyecto != NULL && ($modelProyecto->estado_actual == Estado::$PROYECTO_EN_DESARROLLO || Yii::app()->user->checkeaAccesoMasivo(array(Rol::$ADMINISTRADOR, Rol::$SUPER_USUARIO)))) {

                if (isset($_POST['EvaluacionProyectoGuia'])) {
                    $model->attributes = $_POST['EvaluacionProyectoGuia'];
                    if ($model->save()) {
                        Yii::app()->user->setFlash('success', "Evaluación actualizada correctamente");
                        $this->redirect(array('proyecto/view', 'id' => $model->id_proyecto));
                    }
                }
                $this->renderPartial('update', array(
                    'model' => $model,
                        ), false, true);
            } else {
                $this->renderPartial('error', array('mensaje' => 'El proyecto no se encuentra disponible para modificaciones.',), FALSE, true);
            }
        } else {
            $this->renderPartial('error', array('mensaje' => 'La evaluación pertenece al historial, no puede ser modificada.',), FALSE, true);
        }
    }

    public function actionUpdateYRevision($id) {
        $model = $this->loadModel($id);
        $model->scenario = "envia";
        $this->performAjaxValidation($model);
        if ($model->id_evaluacion_proyecto_guia_padre == NULL) {
            // Uncomment the following line if AJAX validation is needed
            $modelProyecto = Proyecto::model()->findByPk($model->id_proyecto);
            if ($modelProyecto != NULL && ($modelProyecto->estado_actual == Estado::$PROYECTO_EN_DESARROLLO || Yii::app()->user->checkeaAccesoMasivo(array(Rol::$ADMINISTRADOR, Rol::$SUPER_USUARIO)))) {
                //  $this->performAjaxValidation($model);
                if (isset($_POST['EvaluacionProyectoGuia'])) {
                    $model->attributes = $_POST['EvaluacionProyectoGuia'];
                    $model->estado = Estado::$EVALUACION_ENVIADA;
                    if ($model->evaluacionCompleta()) {
                        if ($model->save()) {
                            Yii::app()->user->setFlash('success', "Evaluación guardada y enviada correctamente");
                            $this->redirect(array('proyecto/view', 'id' => $model->id_proyecto));
                        }
                    } else {
                        Yii::app()->user->setFlash('error', "La evaluación en el <b>desarrollo del proyecto por el profesor Guía</b> no está completa, favor de completar y luego enviar.");
                        $this->redirect(array('proyecto/view', 'id' => $model->id_proyecto));
                    }
                }
                $this->render('update', array(
                    'model' => $model,
                ));
            } else {
                $this->render('error', array('mensaje' => 'El proyecto no se encuentra disponible para modificaciones.',));
            }
        } else {
            $this->render('error', array('mensaje' => 'La evaluación pertenece al historial, no puede ser modificada.',));
        }
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
        $dataProvider = new CActiveDataProvider('EvaluacionProyectoGuia');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new EvaluacionProyectoGuia('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['EvaluacionProyectoGuia']))
            $model->attributes = $_GET['EvaluacionProyectoGuia'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return EvaluacionProyectoGuia the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = EvaluacionProyectoGuia::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'La petición no existe.');
        else {
            if ($this->esPropietario($model)) {
                return $model;
            } else {
                throw new CHttpException(403, 'Ud no está autorizado.');
            }
        }
    }

    /**
     * Performs the AJAX validation.
     * @param EvaluacionProyectoGuia $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'evaluacion-proyecto-guia-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * Performs the AJAX validation.
     * @param EvaluacionProyectoGuia $model the model to be validated
     */
    private function esPropietario($model) {

        $propietario = FALSE;
        if ($model->idProyecto->prof_guia == Yii::app()->user->id) {
            $propietario = TRUE;
        }
        foreach ($model->idProyecto->idPropuesta->propuestaInscritas as $pro) {
            if ($pro->usuario == Yii::app()->user->id) {
                $propietario = TRUE;
            }
        }
        return Yii::app()->user->checkeaAccesoMasivo(array(Rol::$ADMINISTRADOR, Rol::$SUPER_USUARIO)) || $propietario;
    }

}
