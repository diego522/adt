
<?php
/* @var $this AvanceController */
/* @var $model Avance */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'avance-form',
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
        'enableAjaxValidation' => false,
            /* 'clientOptions' => array(
              'validateOnSubmit' => true,) */
    ));
    ?>

    <p class="note">Los campos con <span class="required">*</span> son requeridos</p>

    <?php echo $form->errorSummary($model); ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'titulo'); ?>
        <?php echo $form->textField($model, 'titulo', array('size' => 20, 'maxlength' => 200)); ?> 
        <?php echo $form->error($model, 'titulo'); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model, 'descripcion'); ?>
        <?php echo $form->textArea($model, 'descripcion',array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'descripcion'); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model, 'ruta_adjunto'); ?>
        <?php echo $form->fileField($model, 'ruta_adjunto'); ?><?php if ($model->ruta_adjunto) echo CHtml::link('Descargar', array('download', 'id' => $model->ruta_adjunto,)); ?>
        <?php echo $form->error($model, 'ruta_adjunto'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar cambios'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->


<script>
    tinymce.init({selector: 'textarea', language: 'es'});
</script>
<?php
Yii::app()->clientScript->registerScriptFile(
        Yii::app()->baseUrl . '/js/tinymce/tinymce.min.js'
);
?>