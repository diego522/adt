<?php
/* @var $this EvaluacionProyectoInformanteController */
/* @var $model EvaluacionProyectoInformante */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_evaluacion_proyecto_informante'); ?>
		<?php echo $form->textField($model,'id_evaluacion_proyecto_informante'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_evaluacion_proyecto_informante_padre'); ?>
		<?php echo $form->textField($model,'id_evaluacion_proyecto_informante_padre'); ?>
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
		<?php echo $form->label($model,'informe_destaca_importante'); ?>
		<?php echo $form->textField($model,'informe_destaca_importante'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'informe_expone_claro'); ?>
		<?php echo $form->textField($model,'informe_expone_claro'); ?>
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
		<?php echo $form->label($model,'informe_opiniones_propias'); ?>
		<?php echo $form->textField($model,'informe_opiniones_propias'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'informe_aportes_personales'); ?>
		<?php echo $form->textField($model,'informe_aportes_personales'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'informe_domina_conceptos'); ?>
		<?php echo $form->textField($model,'informe_domina_conceptos'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'informe_domina_tecnicas'); ?>
		<?php echo $form->textField($model,'informe_domina_tecnicas'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'informe_cumple_objetivo'); ?>
		<?php echo $form->textField($model,'informe_cumple_objetivo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'producto_ajusta_requerimientos'); ?>
		<?php echo $form->textField($model,'producto_ajusta_requerimientos'); ?>
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
		<?php echo $form->label($model,'producto_documentacion'); ?>
		<?php echo $form->textField($model,'producto_documentacion'); ?>
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