<?php
/* @var $this DefensaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Defensas',
);

$this->menu=array(
	array('label'=>'Create Defensa', 'url'=>array('create')),
	array('label'=>'Manage Defensa', 'url'=>array('admin')),
);
?>

<h1>Defensas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
