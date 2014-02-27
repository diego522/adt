<?php
/* @var $this TipoEstadoController */
/* @var $model TipoEstado */

$this->breadcrumbs=array(
	'Tipo Estados'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoEstado', 'url'=>array('index')),
	array('label'=>'Manage TipoEstado', 'url'=>array('admin')),
);
?>

<h1>Create TipoEstado</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>