<?php
/* @var $this TipoCampoController */
/* @var $model TipoCampo */

$this->breadcrumbs=array(
	'Tipo Campos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoCampo', 'url'=>array('index')),
	array('label'=>'Manage TipoCampo', 'url'=>array('admin')),
);
?>

<h1>Create TipoCampo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>