<?php
/* @var $this CampoController */
/* @var $data Campo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_campo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_campo), array('view', 'id'=>$data->id_campo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_campo')); ?>:</b>
	<?php echo CHtml::encode($data->id_tipo_campo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('campo')); ?>:</b>
	<?php echo CHtml::encode($data->campo); ?>
	<br />


</div>