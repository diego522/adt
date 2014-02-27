<?php
/* @var $this EvaluacionProyectoGuiaController */
/* @var $model EvaluacionProyectoGuia */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_evaluacion_proyecto_guia'); ?>
		<?php echo $form->textField($model,'id_evaluacion_proyecto_guia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_evaluacion_proyecto_guia_padre'); ?>
		<?php echo $form->textField($model,'id_evaluacion_proyecto_guia_padre'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_proyecto'); ?>
		<?php echo $form->textField($model,'id_proyecto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_alumno'); ?>
		<?php echo $form->textField($model,'id_alumno'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_creador'); ?>
		<?php echo $form->textField($model,'id_creador'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_actualizacion'); ?>
		<?php echo $form->textField($model,'fecha_actualizacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'desarrollo_cumple_plazo'); ?>
		<?php echo $form->textField($model,'desarrollo_cumple_plazo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'desarrollo_manifiesta_iniciativa'); ?>
		<?php echo $form->textField($model,'desarrollo_manifiesta_iniciativa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'desarrollo_desarrolla_conocimiento'); ?>
		<?php echo $form->textField($model,'desarrollo_desarrolla_conocimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'informe_destaca_importante'); ?>
		<?php echo $form->textField($model,'informe_destaca_importante'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'informe_expone_claramente'); ?>
		<?php echo $form->textField($model,'informe_expone_claramente'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'informe_bien_estructurado'); ?>
		<?php echo $form->textField($model,'informe_bien_estructurado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'informe_adecuada_bibliografia'); ?>
		<?php echo $form->textField($model,'informe_adecuada_bibliografia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'informe_plantea_opinion'); ?>
		<?php echo $form->textField($model,'informe_plantea_opinion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'producto_ajusta_requerimiento'); ?>
		<?php echo $form->textField($model,'producto_ajusta_requerimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'producto_interfaz_adecuada'); ?>
		<?php echo $form->textField($model,'producto_interfaz_adecuada'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'producto_robustez'); ?>
		<?php echo $form->textField($model,'producto_robustez'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'producto_documentacion_completa'); ?>
		<?php echo $form->textField($model,'producto_documentacion_completa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'producto_especifica_proceso'); ?>
		<?php echo $form->textField($model,'producto_especifica_proceso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comentarios'); ?>
		<?php echo $form->textArea($model,'comentarios',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->