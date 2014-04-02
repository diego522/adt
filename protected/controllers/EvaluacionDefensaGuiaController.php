<?php

class EvaluacionDefensaGuiaController extends Controller {

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
                'roles' => array(Rol::$SUPER_USUARIO, Rol::$ALUMNO, Rol::$ADMINISTRADOR, Rol::$PROFESOR,),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'createYRevision', 'updateYRevision','clonar'),
                'roles' => array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR, Rol::$PROFESOR),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
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

    public function actionCalculaNota() {
        $model = new EvaluacionDefensaGuia;
        if (isset($_GET['EvaluacionDefensaGuia'])) {
            $model->attributes = $_GET['EvaluacionDefensaGuia'];
            //var_dump($model->attributes);
            echo $model->obtienePromedio();
        } else
            echo "0";
    }

    public function actionClonar($id_alumno_destino, $id_evaluacion) {
        $modelOriginal = EvaluacionDefensaGuia::model()->findByPk($id_evaluacion);
        if (isset($modelOriginal)) {
            //proceso de clonado
            $modelNuevo = new EvaluacionDefensaGuia;
            $modelNuevo->attributes = $modelOriginal->attributes;
            $modelNuevo->id_alumno = $id_alumno_destino;
            $modelNuevo->isNewRecord=TRUE;
            $modelNuevo->id_evaluacion_defensa_guia=NULL;
            $modelNuevo->id_evaluacion_defensa_guia_padre=NULL;
            if ($modelNuevo->save()) {
                Yii::app()->user->setFlash('success', "Evaluación clonada correctamente ");
            } else {
                Yii::app()->user->setFlash('error', "La evaluación no puede ser clonada");
            }
        } else {
            Yii::app()->user->setFlash('error', "La evaluación no puede ser clonada");
        }
        $this->redirect(array('proyecto/view', 'id' => $modelOriginal->id_proyecto));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($ida, $idp) {
        $model = new EvaluacionDefensaGuia;
        $model->id_alumno = $ida;
        $model->id_proyecto = $idp;
        $modelProyecto = Proyecto::model()->findByPk($idp);
        if ($modelProyecto != NULL && ($modelProyecto->estado_actual == Estado::$PROYECTO_EN_DESARROLLO || Yii::app()->user->checkeaAccesoMasivo(array(Rol::$ADMINISTRADOR, Rol::$SUPER_USUARIO)))) {
            // Uncomment the following line if AJAX validation is needed
            $this->performAjaxValidation($model);
            if (isset($_POST['EvaluacionDefensaGuia'])) {
                $model->attributes = $_POST['EvaluacionDefensaGuia'];
                $model->estado = Estado::$EVALUACION_PENDIENTE_DE_ENVIO;
                if ($model->evaluacionCompleta()) {
                    if ($model->save()) {
                        Yii::app()->user->setFlash('success', "Evaluación guardada correctamente");
                        $this->redirect(array('proyecto/view', 'id' => $model->id_proyecto));
                    }
                } else {
                    Yii::app()->user->setFlash('error', "La evaluación en la <b>defensa por el profesor Guía</b> no está completa, favor de completar y luego enviar.");
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
        $model = new EvaluacionDefensaGuia;
        $model->scenario = "envia";
        $model->id_alumno = $ida;
        $model->id_proyecto = $idp;
        $modelProyecto = Proyecto::model()->findByPk($idp);
        if ($modelProyecto != NULL && ($modelProyecto->estado_actual == Estado::$PROYECTO_EN_DESARROLLO || Yii::app()->user->checkeaAccesoMasivo(array(Rol::$ADMINISTRADOR, Rol::$SUPER_USUARIO)))) {
            // Uncomment the following line if AJAX validation is needed
            $this->performAjaxValidation($model);
            if (isset($_POST['EvaluacionDefensaGuia'])) {
                $model->attributes = $_POST['EvaluacionDefensaGuia'];
                $model->estado = Estado::$EVALUACION_ENVIADA;
                if ($model->evaluacionCompleta()) {
                    if ($model->save()) {
                        Yii::app()->user->setFlash('success', "Evaluación guardada correctamente");
                        $this->redirect(array('proyecto/view', 'id' => $model->id_proyecto));
                    }
                } else {
                    Yii::app()->user->setFlash('error', "La evaluación en la <b>defensa por el profesor Guía</b> no está completa, favor de completar y luego enviar.");
                    $this->redirect(array('proyecto/view', 'id' => $model->id_proyecto));
                }
            }
            $this->render('create', array(
                'model' => $model,
            ));
        } else {
            $this->renderPartial('error', array('mensaje' => 'El proyecto no se encuentra disponible para modificaciones.',), FALSE, true);
        }
    }

    public function actionVerPDF($id) {
//traer a los participantes
        $model = $this->loadModel($id);
        if ($model != NULL) {
            $html2pdf = Yii::app()->ePdf->HTML2PDF();
            $html2pdf->setDefaultFont('helvetica');
            $html2pdf->WriteHTML($this->renderPartial('evaluacionPDF', array('model' => $model,), true));
            $html2pdf->Output('evaluacion_defensa_guia_' . $model->idAlumno->nombre . '.pdf', 'D');
        } else {
            Yii::app()->user->setFlash('error', "El reporte no puede ser generado");
            $this->actionView($id);
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $model->scenario = "envia";
        if ($model->id_evaluacion_defensa_guia_padre == NULL) {
            $modelProyecto = Proyecto::model()->findByPk($model->id_proyecto);
            if ($modelProyecto != NULL && ($modelProyecto->estado_actual == Estado::$PROYECTO_EN_DESARROLLO || Yii::app()->user->checkeaAccesoMasivo(array(Rol::$ADMINISTRADOR, Rol::$SUPER_USUARIO)))) {
                // Uncomment the following line if AJAX validation is needed
                $this->performAjaxValidation($model);
                if (isset($_POST['EvaluacionDefensaGuia'])) {
                    $model->attributes = $_POST['EvaluacionDefensaGuia'];
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
        if ($model->id_evaluacion_defensa_guia_padre == NULL) {
            $modelProyecto = Proyecto::model()->findByPk($model->id_proyecto);
            if ($modelProyecto != NULL && ($modelProyecto->estado_actual == Estado::$PROYECTO_EN_DESARROLLO || Yii::app()->user->checkeaAccesoMasivo(array(Rol::$ADMINISTRADOR, Rol::$SUPER_USUARIO)))) {
                // Uncomment the following line if AJAX validation is needed
                $this->performAjaxValidation($model);
                if (isset($_POST['EvaluacionDefensaGuia'])) {
                    $model->attributes = $_POST['EvaluacionDefensaGuia'];
                    $model->estado = Estado::$EVALUACION_ENVIADA;
                    if ($model->save()) {
                        Yii::app()->user->setFlash('success', "Evaluación actualizada correctamente");
                        $this->redirect(array('proyecto/view', 'id' => $model->id_proyecto));
                    }
                }
                $this->render('update', array(
                    'model' => $model,
                ));
            } else {
                $this->renderPartial('error', array('mensaje' => 'El proyecto no se encuentra disponible para modificaciones.',), FALSE, true);
            }
        } else {
            $this->renderPartial('error', array('mensaje' => 'La evaluación pertenece al historial, no puede ser modificada.',), FALSE, true);
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
        $dataProvider = new CActiveDataProvider('EvaluacionDefensaGuia');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new EvaluacionDefensaGuia('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['EvaluacionDefensaGuia']))
            $model->attributes = $_GET['EvaluacionDefensaGuia'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return EvaluacionDefensaGuia the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = EvaluacionDefensaGuia::model()->findByPk($id);
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
     * @param EvaluacionDefensaGuia $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'evaluacion-defensa-guia-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

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
