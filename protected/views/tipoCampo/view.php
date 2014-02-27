<?php
/* @var $this TipoCampoController */
/* @var $model TipoCampo */

$this->breadcrumbs=array(
	'Tipo Campos'=>array('index'),
	$model->id_tipo_campo,
);

$this->menu=array(
	array('label'=>'List TipoCampo', 'url'=>array('index')),
	array('label'=>'Create TipoCampo', 'url'=>array('create')),
	array('label'=>'Update TipoCampo', 'url'=>array('update', 'id'=>$model->id_tipo_campo)),
	array('label'=>'Delete TipoCampo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipo_campo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoCampo', 'url'=>array('admin')),
);
?>

<h1>View TipoCampo #<?php echo $model->id_tipo_campo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_tipo_campo',
		'nombre',
	),
)); ?>
