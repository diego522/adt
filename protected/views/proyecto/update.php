<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */

$this->breadcrumbs=array(
	'Proyectos'=>array('index'),
	'Proyecto'=>array('view','id'=>$model->id_proyecto),
	'Actualizar',
);


?>

<h1>Actualizar Proyecto </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>