<?php
/* @var $this EvaluacionProyectoGuiaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Evaluacion Proyecto Guias',
);

$this->menu=array(
	array('label'=>'Create EvaluacionProyectoGuia', 'url'=>array('create')),
	array('label'=>'Manage EvaluacionProyectoGuia', 'url'=>array('admin')),
);
?>

<h1>Evaluacion Proyecto Guias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
