<?php
/* @var $this PropuestaController */
/* @var $model Propuesta*/


$this->breadcrumbs = array(
    'Propuestas disponibles',
);

?>

<h1>Listado de propuestas de tema disponibles para inscripción</h1>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
