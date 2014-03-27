<?php
/* @var $this EvaluacionProyectoInformanteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Evaluacion Proyecto Informantes',
);

$this->menu=array(
	array('label'=>'Create EvaluacionProyectoInformante', 'url'=>array('create')),
	array('label'=>'Manage EvaluacionProyectoInformante', 'url'=>array('admin')),
);
?>

<h1>Evaluacion Proyecto Informantes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
