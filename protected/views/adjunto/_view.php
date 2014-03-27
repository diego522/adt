<?php
/* @var $this AdjuntoController */
/* @var $data Adjunto */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_adjunto')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_adjunto), array('view', 'id'=>$data->id_adjunto)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('filename')); ?>:</b>
	<?php echo CHtml::encode($data->filename); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('filecontenttype')); ?>:</b>
	<?php echo CHtml::encode($data->filecontenttype); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creador')); ?>:</b>
	<?php echo CHtml::encode($data->creador); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ruta')); ?>:</b>
	<?php echo CHtml::encode($data->ruta); ?>
	<br />


</div>