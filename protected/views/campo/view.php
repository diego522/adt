<?php
/* @var $this CampoController */
/* @var $model Campo */

$this->breadcrumbs=array(
	'Campos'=>array('index'),
	$model->id_campo,
);

$this->menu=array(
	array('label'=>'List Campo', 'url'=>array('index')),
	array('label'=>'Create Campo', 'url'=>array('create')),
	array('label'=>'Update Campo', 'url'=>array('update', 'id'=>$model->id_campo)),
	array('label'=>'Delete Campo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_campo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Campo', 'url'=>array('admin')),
);
?>

<h1>View Campo #<?php echo $model->id_campo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_campo',
		'id_tipo_campo',
		'campo',
	),
)); ?>
