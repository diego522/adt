<?php
/* @var $this EvaluacionDefensaSalaController */
/* @var $model EvaluacionDefensaSala */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_evaluacion_defensa_sala'); ?>
		<?php echo $form->textField($model,'id_evaluacion_defensa_sala'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_evaluacion_defensa_sala_padre'); ?>
		<?php echo $form->textField($model,'id_evaluacion_defensa_sala_padre'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_alumno'); ?>
		<?php echo $form->textField($model,'id_alumno'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_proyecto'); ?>
		<?php echo $form->textField($model,'id_proyecto'); ?>
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
		<?php echo $form->label($model,'general_formal'); ?>
		<?php echo $form->textField($model,'general_formal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'general_seguridad'); ?>
		<?php echo $form->textField($model,'general_seguridad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'general_uso_medios'); ?>
		<?php echo $form->textField($model,'general_uso_medios'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'general_planifica_presentacion'); ?>
		<?php echo $form->textField($model,'general_planifica_presentacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'general_material_visual'); ?>
		<?php echo $form->textField($model,'general_material_visual'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'especifico_claridad'); ?>
		<?php echo $form->textField($model,'especifico_claridad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'especifico_destaca_aspectos'); ?>
		<?php echo $form->textField($model,'especifico_destaca_aspectos'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'especifico_conclusiones'); ?>
		<?php echo $form->textField($model,'especifico_conclusiones'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'especifico_respuestas'); ?>
		<?php echo $form->textField($model,'especifico_respuestas'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'especifico_desempeño'); ?>
		<?php echo $form->textField($model,'especifico_desempeño'); ?>
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