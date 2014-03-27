<?php
/* @var $this EvaluacionDefensaGuiaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Evaluacion Defensa Guias',
);

$this->menu=array(
	array('label'=>'Create EvaluacionDefensaGuia', 'url'=>array('create')),
	array('label'=>'Manage EvaluacionDefensaGuia', 'url'=>array('admin')),
);
?>

<h1>Evaluacion Defensa Guias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
