<?php
/* @var $this EvaluacionDefensaSalaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Evaluacion Defensa Salas',
);

$this->menu=array(
	array('label'=>'Create EvaluacionDefensaSala', 'url'=>array('create')),
	array('label'=>'Manage EvaluacionDefensaSala', 'url'=>array('admin')),
);
?>

<h1>Evaluacion Defensa Salas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
