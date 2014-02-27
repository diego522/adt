<?php
/* @var $this CampoController */
/* @var $model Campo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'campo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_tipo_campo'); ?>
		<?php echo $form->textField($model,'id_tipo_campo'); ?>
		<?php echo $form->error($model,'id_tipo_campo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'campo'); ?>
		<?php echo $form->textField($model,'campo',array('size'=>60,'maxlength'=>2000)); ?>
		<?php echo $form->error($model,'campo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->