<?php
/* @var $this EmpresaProyectoController */
/* @var $model EmpresaProyecto */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'empresa-proyecto-form',
        'enableAjaxValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,),
    ));
    ?>

    <p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'rut'); ?>
        <?php echo $form->textField($model, 'rut', array('size' => 20, 'maxlength' => 20, 'onchange' => "javascript:checkRutField(this.value,'EmpresaProyecto_rut')")); ?>
        <?php echo $form->error($model, 'rut'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'nombre_encargado'); ?>
        <?php echo $form->textField($model, 'nombre_encargado', array('size' => 30, 'maxlength' => 2000)); ?>
        <?php echo $form->error($model, 'nombre_encargado'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'nombre_empresa'); ?>
        <?php echo $form->textField($model, 'nombre_empresa', array('size' => 30, 'maxlength' => 2000)); ?>
        <?php echo $form->error($model, 'nombre_empresa'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'cargo'); ?>
        <?php echo $form->textField($model, 'cargo', array('size' => 30, 'maxlength' => 2000)); ?>
        <?php echo $form->error($model, 'cargo'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar Cambios'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
<?php
Yii::app()->clientScript->registerScriptFile(
        Yii::app()->baseUrl . '/js/rut.js'
);
?>