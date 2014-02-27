<?php
/* @var $this ProcesoController */
/* @var $model Proceso */

$this->breadcrumbs=array(
	'Periodo'=>array('index'),
	'Ver'=>array('view','id'=>$model->id_proceso),
	'Actualizar',
);


?>

<h1>Acutalizar Periodo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>