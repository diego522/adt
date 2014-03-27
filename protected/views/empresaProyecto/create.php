<?php
/* @var $this EmpresaProyectoController */
/* @var $model EmpresaProyecto */

$this->breadcrumbs=array(
	'Empresa Proyectos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EmpresaProyecto', 'url'=>array('index')),
	array('label'=>'Manage EmpresaProyecto', 'url'=>array('admin')),
);
?>

<h1>Create EmpresaProyecto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>