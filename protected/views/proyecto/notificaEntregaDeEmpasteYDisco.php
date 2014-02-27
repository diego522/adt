<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */
/* @var $form CActiveForm */
?>

<h1>Entrega de DVD/Empaste </h1>


<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'proyecto-form',
        'enableAjaxValidation' => false,
            /* 'clientOptions' => array(
              'validateOnSubmit' => true,) */
    ));
    ?>
    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'fecha_entrega_cd'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            'attribute' => 'fecha_entrega_cd',
            'language' => 'es',
            //'value' => $model->fecha_entrega_cd,
            // additional javascript options for the date picker plugin
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => 'dd/mm/yy',
                'showButtonPanel' => 'true',
                'changeMonth' => 'true',
                'changeYear' => 'true',
                'constrainInput' => 'false',
            ),));
        ?>
        <?php echo $form->error($model, 'fecha_entrega_cd'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'fecha_entrega_empaste'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            'attribute' => 'fecha_entrega_empaste',
            'language' => 'es',
            //'value' => $model->fecha_entrega_empaste,
            // additional javascript options for the date picker plugin
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => 'dd/mm/yy',
                'showButtonPanel' => 'true',
                'changeMonth' => 'true',
                'changeYear' => 'true',
                'constrainInput' => 'false',
            ),));
        ?>
        <?php echo $form->error($model, 'fecha_entrega_empaste'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Guardar'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
