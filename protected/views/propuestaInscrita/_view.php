<?php
/* @var $this PropuestaInscritaController */
/* @var $data PropuestaInscrita */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_propuesta_inscrita')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_propuesta_inscrita), array('view', 'id'=>$data->id_propuesta_inscrita)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_propuesta')); ?>:</b>
	<?php echo CHtml::encode($data->id_propuesta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario')); ?>:</b>
	<?php echo CHtml::encode($data->usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_creacion); ?>
	<br />


</div>