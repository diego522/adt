<?php
/* @var $this ProcesoController */
/* @var $model Proceso */

$this->breadcrumbs=array(
	'Periodo'=>array('index'),
	'Crear',
);


?>

<h1>Nuevo Periodo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>