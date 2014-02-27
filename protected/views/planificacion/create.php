<?php
/* @var $this PlanificacionController */
/* @var $model Planificacion */

$this->breadcrumbs=array(
	'Planificación'=>array('lista', 'idp' => $model->id_proyecto),
	'Nuevo hito',
);

?>

<h1>Nuevo hito de la planificación</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>