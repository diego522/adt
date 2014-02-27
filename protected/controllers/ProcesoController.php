<?php

class ProcesoController extends Controller {

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
                'actions' => array('index', 'view'),
                'roles' => array(Rol::$SUPER_USUARIO,  Rol::$ADMINISTRADOR),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'roles' => array(Rol::$SUPER_USUARIO,  Rol::$ADMINISTRADOR),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'roles' => array(Rol::$SUPER_USUARIO,  Rol::$ADMINISTRADOR),
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
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Proceso;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Proceso'])) {
            $model->attributes = $_POST['Proceso'];
            //formato de fechas
            $newDate1 = DateTime::createFromFormat('d/m/Y H:i', $model->fecha_inicio);
            if ($newDate1 != null)
                $model->fecha_inicio = $newDate1->format('Y-m-d H:i:s');
            $newDate2 = DateTime::createFromFormat('d/m/Y H:i', $model->fecha_fin);
            if ($newDate2 != null)
                $model->fecha_fin = $newDate2->format('Y-m-d H:i:s');
            $newDate3 = DateTime::createFromFormat('d/m/Y H:i', $model->fecha_fin_proyecto);
            if ($newDate3 != null)
                $model->fecha_fin_proyecto = $newDate3->format('Y-m-d H:i:s');

            //traspasar campus

            $model->id_campus = Yii::app()->user->getState('campus');
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_proceso));
        }

        $this->render('create', array(
            'model' => $model,
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
        $this->performAjaxValidation($model);

        if (isset($_POST['Proceso'])) {
            $model->attributes = $_POST['Proceso'];
            $newDate1 = DateTime::createFromFormat('d/m/Y H:i', $model->fecha_inicio);
            if ($newDate1 != null)
                $model->fecha_inicio = $newDate1->format('Y-m-d H:i:s');
            $newDate2 = DateTime::createFromFormat('d/m/Y H:i', $model->fecha_fin);
            if ($newDate2 != null)
                $model->fecha_fin = $newDate2->format('Y-m-d H:i:s');
            $newDate3 = DateTime::createFromFormat('d/m/Y H:i', $model->fecha_fin_proyecto);
            if ($newDate3 != null)
                $model->fecha_fin_proyecto = $newDate3->format('Y-m-d H:i:s');
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_proceso));
        }
        $this->render('update', array(
            'model' => $model,
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
        $dataProvider = new CActiveDataProvider('Proceso');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Proceso('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Proceso']))
            $model->attributes = $_GET['Proceso'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Proceso the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Proceso::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Proceso $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'proceso-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    protected function gridNombreEstado($data, $row) {
        return Estado::model()->findByPk($data->estado)->nombre;
    }

}