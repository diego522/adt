<?php
/* @var $this CampoController */
/* @var $model Campo */

$this->breadcrumbs=array(
	'Campos'=>array('index'),
	$model->id_campo=>array('view','id'=>$model->id_campo),
	'Update',
);

$this->menu=array(
	array('label'=>'List Campo', 'url'=>array('index')),
	array('label'=>'Create Campo', 'url'=>array('create')),
	array('label'=>'View Campo', 'url'=>array('view', 'id'=>$model->id_campo)),
	array('label'=>'Manage Campo', 'url'=>array('admin')),
);
?>

<h1>Update Campo <?php echo $model->id_campo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>