<?php
/* @var $this EquipoRelUsuarioRelConcursoController */
/* @var $model EquipoRelUsuarioRelConcurso */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'agrega-form',
        'enableAjaxValidation' => false,
    ));
    ?>


    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'Rut del participante'); ?>
        <?php echo $form->textField($model, 'rut', array('onchange' => "javascript:checkRutField(this.value,'AgregaParticipante_rut')")); ?>
        <?php echo $form->error($model, 'rut'); ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeHiddenField($model, 'id_propuesta'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Agregar'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
<?php
Yii::app()->clientScript->registerScriptFile(
        Yii::app()->baseUrl . '/js/rut.js'
);
?>