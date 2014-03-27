<?php
/* @var $this EmpresaProyectoController */
/* @var $model EmpresaProyecto */

$this->breadcrumbs=array(
	'Empresa Proyectos'=>array('index'),
	$model->id_empresa_proyecto,
);

$this->menu=array(
	array('label'=>'List EmpresaProyecto', 'url'=>array('index')),
	array('label'=>'Create EmpresaProyecto', 'url'=>array('create')),
	array('label'=>'Update EmpresaProyecto', 'url'=>array('update', 'id'=>$model->id_empresa_proyecto)),
	array('label'=>'Delete EmpresaProyecto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_empresa_proyecto),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EmpresaProyecto', 'url'=>array('admin')),
);
?>

<h1>View EmpresaProyecto #<?php echo $model->id_empresa_proyecto; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_empresa_proyecto',
		'nombre_encargado',
		'nombre_empresa',
		'cargo',
		'rut',
		'id_proyecto',
	),
)); ?>
