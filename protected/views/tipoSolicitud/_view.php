<?php
/* @var $this TipoSolicitudController */
/* @var $data TipoSolicitud */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_solicitud')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tipo_solicitud), array('view', 'id'=>$data->id_tipo_solicitud)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>