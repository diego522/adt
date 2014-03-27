<?php
/* @var $this PropuestaController */
/* @var $model Propuesta */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_propuesta'); ?>
		<?php echo $form->textField($model,'id_propuesta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_propuesta_padre'); ?>
		<?php echo $form->textField($model,'id_propuesta_padre'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado'); ?>
		<?php echo $form->textField($model,'estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado_presentacion'); ?>
		<?php echo $form->textField($model,'estado_presentacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'titulo'); ?>
		<?php echo $form->textArea($model,'titulo',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usuario_creador'); ?>
		<?php echo $form->textField($model,'usuario_creador'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_creacion'); ?>
		<?php echo $form->textField($model,'fecha_creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_resolucion'); ?>
		<?php echo $form->textField($model,'fecha_resolucion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_resolucion_presentacion'); ?>
		<?php echo $form->textField($model,'fecha_resolucion_presentacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_presentacion'); ?>
		<?php echo $form->textField($model,'fecha_presentacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_presenta_propuesta'); ?>
		<?php echo $form->textField($model,'fecha_presenta_propuesta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_proceso'); ?>
		<?php echo $form->textField($model,'id_proceso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'observaciones'); ?>
		<?php echo $form->textArea($model,'observaciones',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'objetivos'); ?>
		<?php echo $form->textArea($model,'objetivos',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'plan_trabajo'); ?>
		<?php echo $form->textArea($model,'plan_trabajo',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'justificacion'); ?>
		<?php echo $form->textArea($model,'justificacion',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'adjunto'); ?>
		<?php echo $form->textField($model,'adjunto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'metodologia'); ?>
		<?php echo $form->textArea($model,'metodologia',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'trabajos_simi'); ?>
		<?php echo $form->textArea($model,'trabajos_simi',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bibliografia'); ?>
		<?php echo $form->textArea($model,'bibliografia',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre_empresa'); ?>
		<?php echo $form->textArea($model,'nombre_empresa',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre_responsable'); ?>
		<?php echo $form->textArea($model,'nombre_responsable',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cargo_responsable'); ?>
		<?php echo $form->textArea($model,'cargo_responsable',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cant_participantes'); ?>
		<?php echo $form->textField($model,'cant_participantes'); ?>
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