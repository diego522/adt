<?php
/* @var $this EmpresaProyectoController */
/* @var $model EmpresaProyecto */

$this->breadcrumbs=array(
	'Empresa Proyectos'=>array('index'),
	$model->id_empresa_proyecto=>array('view','id'=>$model->id_empresa_proyecto),
	'Update',
);

$this->menu=array(
	array('label'=>'List EmpresaProyecto', 'url'=>array('index')),
	array('label'=>'Create EmpresaProyecto', 'url'=>array('create')),
	array('label'=>'View EmpresaProyecto', 'url'=>array('view', 'id'=>$model->id_empresa_proyecto)),
	array('label'=>'Manage EmpresaProyecto', 'url'=>array('admin')),
);
?>

<h1>Update EmpresaProyecto <?php echo $model->id_empresa_proyecto; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>