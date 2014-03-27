<?php
/* @var $this EvaluacionDefensaInformanteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Evaluacion Defensa Informantes',
);

$this->menu=array(
	array('label'=>'Create EvaluacionDefensaInformante', 'url'=>array('create')),
	array('label'=>'Manage EvaluacionDefensaInformante', 'url'=>array('admin')),
);
?>

<h1>Evaluacion Defensa Informantes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
