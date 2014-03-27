<?php
/* @var $this EvaluacionProyectoInformanteController */
/* @var $data EvaluacionProyectoInformante */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_evaluacion_proyecto_informante')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_evaluacion_proyecto_informante), array('view', 'id'=>$data->id_evaluacion_proyecto_informante)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_evaluacion_proyecto_informante_padre')); ?>:</b>
	<?php echo CHtml::encode($data->id_evaluacion_proyecto_informante_padre); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('informe_destaca_importante')); ?>:</b>
	<?php echo CHtml::encode($data->informe_destaca_importante); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('informe_expone_claro')); ?>:</b>
	<?php echo CHtml::encode($data->informe_expone_claro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('informe_bien_estructurado')); ?>:</b>
	<?php echo CHtml::encode($data->informe_bien_estructurado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('informe_adecuada_bibliografia')); ?>:</b>
	<?php echo CHtml::encode($data->informe_adecuada_bibliografia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('informe_opiniones_propias')); ?>:</b>
	<?php echo CHtml::encode($data->informe_opiniones_propias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('informe_aportes_personales')); ?>:</b>
	<?php echo CHtml::encode($data->informe_aportes_personales); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('informe_domina_conceptos')); ?>:</b>
	<?php echo CHtml::encode($data->informe_domina_conceptos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('informe_domina_tecnicas')); ?>:</b>
	<?php echo CHtml::encode($data->informe_domina_tecnicas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('informe_cumple_objetivo')); ?>:</b>
	<?php echo CHtml::encode($data->informe_cumple_objetivo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('producto_ajusta_requerimientos')); ?>:</b>
	<?php echo CHtml::encode($data->producto_ajusta_requerimientos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('producto_interfaz_adecuada')); ?>:</b>
	<?php echo CHtml::encode($data->producto_interfaz_adecuada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('producto_robustez')); ?>:</b>
	<?php echo CHtml::encode($data->producto_robustez); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('producto_documentacion')); ?>:</b>
	<?php echo CHtml::encode($data->producto_documentacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('producto_especifica_proceso')); ?>:</b>
	<?php echo CHtml::encode($data->producto_especifica_proceso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comentarios')); ?>:</b>
	<?php echo CHtml::encode($data->comentarios); ?>
	<br />

	*/ ?>

</div>