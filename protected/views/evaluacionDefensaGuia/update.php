<?php
/* @var $this EvaluacionDefensaGuiaController */
/* @var $model EvaluacionDefensaGuia */

$this->breadcrumbs=array(
	'Evaluacion Defensa Guias'=>array('index'),
	$model->id_evaluacion_defensa_guia=>array('view','id'=>$model->id_evaluacion_defensa_guia),
	'Update',
);

$this->menu=array(
	array('label'=>'List EvaluacionDefensaGuia', 'url'=>array('index')),
	array('label'=>'Create EvaluacionDefensaGuia', 'url'=>array('create')),
	array('label'=>'View EvaluacionDefensaGuia', 'url'=>array('view', 'id'=>$model->id_evaluacion_defensa_guia)),
	array('label'=>'Manage EvaluacionDefensaGuia', 'url'=>array('admin')),
);
?>

<h1>Modificación evaluación Defensa profesor Guía </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>