<?php
/* @var $this EvaluacionDefensaInformanteController */
/* @var $model EvaluacionDefensaInformante */

$this->breadcrumbs=array(
	'Evaluacion Defensa Informantes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EvaluacionDefensaInformante', 'url'=>array('index')),
	array('label'=>'Manage EvaluacionDefensaInformante', 'url'=>array('admin')),
);
?>

<h1>Nueva evaluación Defensa profesor Informante</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>