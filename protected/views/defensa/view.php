<?php
/* @var $this DefensaController */
/* @var $model Defensa */


?>

<h1>Detalles de la programación de la defensa</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id_defensa',
		'fecha_creacion',
		'fecha_programacion',
		//'id_proyecto',
		'lugar',
		'observaciones',
	),
)); ?>
