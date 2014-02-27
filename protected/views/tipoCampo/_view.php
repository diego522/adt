<?php
/* @var $this TipoCampoController */
/* @var $data TipoCampo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_campo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tipo_campo), array('view', 'id'=>$data->id_tipo_campo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>