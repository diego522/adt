<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_proyecto'); ?>
		<?php echo $form->textField($model,'id_proyecto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado_actual'); ?>
		<?php echo $form->textField($model,'estado_actual'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_creacion'); ?>
		<?php echo $form->textField($model,'fecha_creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_fin'); ?>
		<?php echo $form->textField($model,'fecha_fin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prof_guia'); ?>
		<?php echo $form->textField($model,'prof_guia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prof_informante'); ?>
		<?php echo $form->textField($model,'prof_informante'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prof_sala'); ?>
		<?php echo $form->textField($model,'prof_sala'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_propuesta'); ?>
		<?php echo $form->textField($model,'id_propuesta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_inicio'); ?>
		<?php echo $form->textField($model,'fecha_inicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'calif_defensa_guia'); ?>
		<?php echo $form->textField($model,'calif_defensa_guia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'calif_defensa_info'); ?>
		<?php echo $form->textField($model,'calif_defensa_info'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'calif_defensa_sala'); ?>
		<?php echo $form->textField($model,'calif_defensa_sala'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'calif_guia'); ?>
		<?php echo $form->textField($model,'calif_guia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'calif_informante'); ?>
		<?php echo $form->textField($model,'calif_informante'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->