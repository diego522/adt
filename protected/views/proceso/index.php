<?php
/* @var $this ProcesoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Periodo',
);

$this->menu=array(
	array('label'=>'Nuevo Periodo', 'url'=>array('create')),
	array('label'=>'Administrar Periodo', 'url'=>array('admin')),
);
?>

<h1>Lista de Periodos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
