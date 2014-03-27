<?php
/* @var $this AdjuntoController */
/* @var $model Adjunto */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'adjunto-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'filename'); ?>
		<?php echo $form->textField($model,'filename',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'filename'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'filecontenttype'); ?>
		<?php echo $form->textField($model,'filecontenttype',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'filecontenttype'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'creador'); ?>
		<?php echo $form->textField($model,'creador'); ?>
		<?php echo $form->error($model,'creador'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ruta'); ?>
		<?php echo $form->textField($model,'ruta',array('size'=>60,'maxlength'=>2000)); ?>
		<?php echo $form->error($model,'ruta'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->