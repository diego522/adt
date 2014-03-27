<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */

$this->breadcrumbs=array(
	'Proyectos'=>array('index'),
	'Create',
);


?>

<h1>Create Proyecto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>