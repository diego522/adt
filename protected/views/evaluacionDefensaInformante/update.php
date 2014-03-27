<?php
/* @var $this EvaluacionDefensaInformanteController */
/* @var $model EvaluacionDefensaInformante */

$this->breadcrumbs=array(
	'Evaluacion Defensa Informantes'=>array('index'),
	$model->id_evaluacion_defensa_informante=>array('view','id'=>$model->id_evaluacion_defensa_informante),
	'Update',
);

$this->menu=array(
	array('label'=>'List EvaluacionDefensaInformante', 'url'=>array('index')),
	array('label'=>'Create EvaluacionDefensaInformante', 'url'=>array('create')),
	array('label'=>'View EvaluacionDefensaInformante', 'url'=>array('view', 'id'=>$model->id_evaluacion_defensa_informante)),
	array('label'=>'Manage EvaluacionDefensaInformante', 'url'=>array('admin')),
);
?>

<h1>Modificación evaluación Defensa profesor Informante</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>