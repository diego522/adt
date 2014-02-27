<?php
/* @var $this PlanificacionController */
/* @var $model Planificacion */

$this->breadcrumbs=array(
	'Planificación'=>array('lista', 'idp' => $model->id_proyecto),
	'Hito'=>array('view','id'=>$model->id_planificacion),
	'Modificar',
);


?>

<h1>Modificar hito</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>