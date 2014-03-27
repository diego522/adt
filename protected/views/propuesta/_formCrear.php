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
/* @var $this PropuestaController */
/* @var $model Propuesta */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'propuesta-form',
        'enableAjaxValidation' => false,
        /*'clientOptions' => array(
            'validateOnSubmit' => true,)*/
    ));
    ?>

    <p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'titulo'); ?>
        <?php echo $form->textField($model, 'titulo', array('size' => 90,)); ?>
        <?php echo $form->error($model, 'titulo'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'descripcion'); ?>
        <?php echo $form->textArea($model, 'descripcion'); ?>
        <?php echo $form->error($model, 'descripcion'); ?>
    </div>
    <?php if ($model->id_propuesta != '') { ?>
        <div class="row">
            <?php echo $form->labelEx($model, 'id_propuesta_padre'); ?>
            <?php echo $model->id_propuesta_padre; ?>
            <?php echo $form->error($model, 'id_propuesta_padre'); ?>
        </div>

    <?php } ?>
    <?php if (!$model->isNewRecord && Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR))) { ?>
        <div class="row">
            <?php echo $form->labelEx($model, 'estado'); ?>
            <?php echo $form->dropDownList($model, 'estado', CHtml::listData(Estado::model()->findAll('id_tipo_estado=' . TipoEstado::$PROPUESTA . ' order by orden ASC'), 'id_estado', 'nombre'), array('empty' => 'Ninguno')); ?> 
            <?php echo $form->error($model, 'estado'); ?>
        </div>
    <?php } ?>
    <?php if (!$model->isNewRecord&&Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR))) { ?>
        <div class="row">
            <?php echo $form->labelEx($model, 'usuario_creador'); ?>
            <?php echo $form->dropDownList($model, 'usuario_creador', CHtml::listData(Usuario::model()->findAll('id_rol in (' . Rol::$PROFESOR . ',' . Rol::$ADMINISTRADOR . ',' . Rol::$SUPER_USUARIO . ') and campus=' . Yii::app()->user->getState('campus') . ' order by nombre ASC'), 'id_usuario', 'nombre'), array('empty' => 'Ninguno')); ?> 
            <?php echo $form->error($model, 'usuario_creador'); ?>
        </div>
    <?php } ?>
    <?php if (!$model->isNewRecord) { ?>
        <div class="row">
            <?php echo $form->labelEx($model, 'fecha_creacion'); ?>
            <?php echo $model->fecha_creacion; ?>
        </div>
    <?php } ?>
    <?php if (!$model->isNewRecord) { ?>
        <div class="row">
            <?php echo $form->labelEx($model, 'id_proceso'); ?>
            <?php echo $form->dropDownList($model, 'id_proceso', CHtml::listData(Proceso::model()->findAll('id_campus='.Yii::app()->user->getState('campus') ), 'id_proceso', 'titulo')); ?> 
             <?php echo $form->error($model, 'id_proceso'); ?>
           
        </div>
    <?php } ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'cant_participantes'); ?>
        <?php
        echo $form->dropDownList($model, 'cant_participantes', array(
            '1' => '1',
            '2' => '2',
        ));
        ?> 
        <?php echo $form->error($model, 'cant_participantes'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->