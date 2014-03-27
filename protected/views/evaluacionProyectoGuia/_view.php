<?php
/* @var $this EvaluacionProyectoGuiaController */
/* @var $data EvaluacionProyectoGuia */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_evaluacion_proyecto_guia')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_evaluacion_proyecto_guia), array('view', 'id'=>$data->id_evaluacion_proyecto_guia)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_evaluacion_proyecto_guia_padre')); ?>:</b>
	<?php echo CHtml::encode($data->id_evaluacion_proyecto_guia_padre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_proyecto')); ?>:</b>
	<?php echo CHtml::encode($data->id_proyecto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_alumno')); ?>:</b>
	<?php echo CHtml::encode($data->id_alumno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_creador')); ?>:</b>
	<?php echo CHtml::encode($data->id_creador); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_actualizacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_actualizacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desarrollo_cumple_plazo')); ?>:</b>
	<?php echo CHtml::encode($data->desarrollo_cumple_plazo); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('desarrollo_manifiesta_iniciativa')); ?>:</b>
	<?php echo CHtml::encode($data->desarrollo_manifiesta_iniciativa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desarrollo_desarrolla_conocimiento')); ?>:</b>
	<?php echo CHtml::encode($data->desarrollo_desarrolla_conocimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('informe_destaca_importante')); ?>:</b>
	<?php echo CHtml::encode($data->informe_destaca_importante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('informe_expone_claramente')); ?>:</b>
	<?php echo CHtml::encode($data->informe_expone_claramente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('informe_bien_estructurado')); ?>:</b>
	<?php echo CHtml::encode($data->informe_bien_estructurado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('informe_adecuada_bibliografia')); ?>:</b>
	<?php echo CHtml::encode($data->informe_adecuada_bibliografia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('informe_plantea_opinion')); ?>:</b>
	<?php echo CHtml::encode($data->informe_plantea_opinion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('producto_ajusta_requerimiento')); ?>:</b>
	<?php echo CHtml::encode($data->producto_ajusta_requerimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('producto_interfaz_adecuada')); ?>:</b>
	<?php echo CHtml::encode($data->producto_interfaz_adecuada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('producto_robustez')); ?>:</b>
	<?php echo CHtml::encode($data->producto_robustez); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('producto_documentacion_completa')); ?>:</b>
	<?php echo CHtml::encode($data->producto_documentacion_completa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('producto_especifica_proceso')); ?>:</b>
	<?php echo CHtml::encode($data->producto_especifica_proceso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comentarios')); ?>:</b>
	<?php echo CHtml::encode($data->comentarios); ?>
	<br />

	*/ ?>

</div>