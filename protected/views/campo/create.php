<?php
/* @var $this CampoController */
/* @var $model Campo */

$this->breadcrumbs=array(
	'Campos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Campo', 'url'=>array('index')),
	array('label'=>'Manage Campo', 'url'=>array('admin')),
);
?>

<h1>Create Campo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>