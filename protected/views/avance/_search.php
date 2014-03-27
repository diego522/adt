<?php
/* @var $this AvanceController */
/* @var $model Avance */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_avance'); ?>
		<?php echo $form->textField($model,'id_avance'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_planificacion'); ?>
		<?php echo $form->textField($model,'id_planificacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_proyecto'); ?>
		<?php echo $form->textField($model,'id_proyecto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>2000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_creacion'); ?>
		<?php echo $form->textField($model,'fecha_creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ruta_adjunto'); ?>
		<?php echo $form->textField($model,'ruta_adjunto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'creador'); ?>
		<?php echo $form->textField($model,'creador'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->