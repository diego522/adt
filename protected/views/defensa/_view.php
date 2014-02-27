<?php
/* @var $this DefensaController */
/* @var $data Defensa */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_defensa')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_defensa), array('view', 'id'=>$data->id_defensa)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_programacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_programacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_proyecto')); ?>:</b>
	<?php echo CHtml::encode($data->id_proyecto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lugar')); ?>:</b>
	<?php echo CHtml::encode($data->lugar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observaciones')); ?>:</b>
	<?php echo CHtml::encode($data->observaciones); ?>
	<br />


</div>