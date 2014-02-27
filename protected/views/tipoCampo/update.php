<?php
/* @var $this TipoCampoController */
/* @var $model TipoCampo */

$this->breadcrumbs=array(
	'Tipo Campos'=>array('index'),
	$model->id_tipo_campo=>array('view','id'=>$model->id_tipo_campo),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoCampo', 'url'=>array('index')),
	array('label'=>'Create TipoCampo', 'url'=>array('create')),
	array('label'=>'View TipoCampo', 'url'=>array('view', 'id'=>$model->id_tipo_campo)),
	array('label'=>'Manage TipoCampo', 'url'=>array('admin')),
);
?>

<h1>Update TipoCampo <?php echo $model->id_tipo_campo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>