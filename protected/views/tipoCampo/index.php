<?php
/* @var $this TipoCampoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Campos',
);

$this->menu=array(
	array('label'=>'Create TipoCampo', 'url'=>array('create')),
	array('label'=>'Manage TipoCampo', 'url'=>array('admin')),
);
?>

<h1>Tipo Campos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
