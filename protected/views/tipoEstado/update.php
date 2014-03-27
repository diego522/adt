<?php
/* @var $this TipoEstadoController */
/* @var $model TipoEstado */

$this->breadcrumbs=array(
	'Tipo Estados'=>array('index'),
	$model->id_tipo_estado=>array('view','id'=>$model->id_tipo_estado),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoEstado', 'url'=>array('index')),
	array('label'=>'Create TipoEstado', 'url'=>array('create')),
	array('label'=>'View TipoEstado', 'url'=>array('view', 'id'=>$model->id_tipo_estado)),
	array('label'=>'Manage TipoEstado', 'url'=>array('admin')),
);
?>

<h1>Update TipoEstado <?php echo $model->id_tipo_estado; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>