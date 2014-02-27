<script>
    tinymce.init({selector: 'textarea', language: 'es', 
        plugins: "paste textcolor table",
        tools: "inserttable"
    });
</script>
<?php
Yii::app()->clientScript->registerScriptFile(
        Yii::app()->baseUrl . '/js/tinymce/tinymce.min.js'
);
?>
<?php
/* @var $this SolicitudController */
/* @var $model Solicitud */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'solicitud-form',
        'enableAjaxValidation' => false,
        /*'clientOptions' => array(
            'validateOnSubmit' => true,)*/
    ));
    ?>

    <p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'id_tipo_solicitud'); ?>
        <?php echo $form->dropDownList($model, 'id_tipo_solicitud', CHtml::listData(TipoSolicitud::model()->findAll(), 'id_tipo_solicitud', 'nombre')) ?>
        <?php echo $form->error($model, 'id_tipo_solicitud'); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model, 'motivo'); ?>
        <?php echo $form->textArea($model, 'motivo', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'motivo'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Modificar'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->