<?php
/* @var $this EmpresaProyectoController */
/* @var $data EmpresaProyecto */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_empresa_proyecto')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_empresa_proyecto), array('view', 'id'=>$data->id_empresa_proyecto)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_encargado')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_encargado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_empresa')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_empresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cargo')); ?>:</b>
	<?php echo CHtml::encode($data->cargo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rut')); ?>:</b>
	<?php echo CHtml::encode($data->rut); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_proyecto')); ?>:</b>
	<?php echo CHtml::encode($data->id_proyecto); ?>
	<br />


</div>