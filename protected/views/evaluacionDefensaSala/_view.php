<?php
/* @var $this EvaluacionDefensaSalaController */
/* @var $data EvaluacionDefensaSala */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_evaluacion_defensa_sala')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_evaluacion_defensa_sala), array('view', 'id'=>$data->id_evaluacion_defensa_sala)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_evaluacion_defensa_sala_padre')); ?>:</b>
	<?php echo CHtml::encode($data->id_evaluacion_defensa_sala_padre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_alumno')); ?>:</b>
	<?php echo CHtml::encode($data->id_alumno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_proyecto')); ?>:</b>
	<?php echo CHtml::encode($data->id_proyecto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_creador')); ?>:</b>
	<?php echo CHtml::encode($data->id_creador); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_actualizacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_actualizacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('general_formal')); ?>:</b>
	<?php echo CHtml::encode($data->general_formal); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('general_seguridad')); ?>:</b>
	<?php echo CHtml::encode($data->general_seguridad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('general_uso_medios')); ?>:</b>
	<?php echo CHtml::encode($data->general_uso_medios); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('general_planifica_presentacion')); ?>:</b>
	<?php echo CHtml::encode($data->general_planifica_presentacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('general_material_visual')); ?>:</b>
	<?php echo CHtml::encode($data->general_material_visual); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('especifico_claridad')); ?>:</b>
	<?php echo CHtml::encode($data->especifico_claridad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('especifico_destaca_aspectos')); ?>:</b>
	<?php echo CHtml::encode($data->especifico_destaca_aspectos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('especifico_conclusiones')); ?>:</b>
	<?php echo CHtml::encode($data->especifico_conclusiones); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('especifico_respuestas')); ?>:</b>
	<?php echo CHtml::encode($data->especifico_respuestas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('especifico_desempeño')); ?>:</b>
	<?php echo CHtml::encode($data->especifico_desempeño); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comentarios')); ?>:</b>
	<?php echo CHtml::encode($data->comentarios); ?>
	<br />

	*/ ?>

</div>