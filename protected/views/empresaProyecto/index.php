<?php
/* @var $this EmpresaProyectoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Empresa Proyectos',
);

$this->menu=array(
	array('label'=>'Create EmpresaProyecto', 'url'=>array('create')),
	array('label'=>'Manage EmpresaProyecto', 'url'=>array('admin')),
);
?>

<h1>Empresa Proyectos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
