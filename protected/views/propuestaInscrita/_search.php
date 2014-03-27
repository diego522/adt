<?php
/* @var $this PropuestaInscritaController */
/* @var $model PropuestaInscrita */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_propuesta_inscrita'); ?>
		<?php echo $form->textField($model,'id_propuesta_inscrita'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_propuesta'); ?>
		<?php echo $form->textField($model,'id_propuesta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usuario'); ?>
		<?php echo $form->textField($model,'usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_creacion'); ?>
		<?php echo $form->textField($model,'fecha_creacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->