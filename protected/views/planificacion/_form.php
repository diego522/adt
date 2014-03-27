
<?php
/* @var $this PlanificacionController */
/* @var $model Planificacion */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'planificacion-form',
        'enableAjaxValidation' => false,
        /*'clientOptions' => array(
            'validateOnSubmit' => true,)*/
    ));
    ?>

    <p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

    <?php echo $form->errorSummary($model); ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'titulo'); ?>
        <?php echo $form->textField($model, 'titulo', array('size' => 20, 'maxlength' => 200)); ?> 
        <?php echo $form->error($model, 'titulo'); ?>
    </div>

    <?php if (!$model->isNewRecord) { ?>
        <div class="row">
            <?php echo $form->labelEx($model, 'creador'); ?>
            <?php echo $model->creador0->nombre; ?>
            <?php echo $form->error($model, 'creador'); ?>
        </div>
    <?php } ?>

    <?php if (!$model->isNewRecord) { ?>
        <div class="row">
            <?php echo $form->labelEx($model, 'estado'); ?>
            <?php echo $form->dropDownList($model, 'estado', CHtml::listData(Estado::model()->findAll('id_tipo_estado=' . TipoEstado::$PLANIFICACION . ' order by orden ASC'), 'id_estado', 'nombre'), array('empty' => 'Ninguno')); ?> 
            <?php echo $form->error($model, 'estado'); ?>
        </div>
    <?php } ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'avance'); ?>
        <?php echo $form->textField($model, 'avance', array('size' => 10, 'maxlength' => 10)); ?>% (porcentaje por planificar <?php echo (100-Planificacion::porcentajePlanificado($model->id_proyecto)).'%'; ?>) 
        <?php echo $form->error($model, 'avance'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'descripcion'); ?>
        <?php echo $form->textArea($model, 'descripcion'); ?>
        <?php echo $form->error($model, 'descripcion'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'fecha_plan'); ?>
        <?php
        $this->widget(
                'ext.jui.EJuiDateTimePicker', array(
            'model' => $model,
            'attribute' => 'fecha_plan',
            'language' => 'es', //default Yii::app()->language
            'mode' => 'datetime', //'datetime' or 'time' ('datetime' default)
            'options' => array(
                'dateFormat' => 'dd/mm/yy',
                'timeFormat' => 'hh:mm', //'hh:mm tt' default
            ),
                )
        );
        ?>
        <?php echo $form->error($model, 'fecha_plan'); ?>
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