<?php
/* @var $this CampoController */
/* @var $model Campo */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_campo'); ?>
		<?php echo $form->textField($model,'id_campo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_tipo_campo'); ?>
		<?php echo $form->textField($model,'id_tipo_campo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'campo'); ?>
		<?php echo $form->textField($model,'campo',array('size'=>60,'maxlength'=>2000)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->