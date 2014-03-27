<script>
    tinymce.init({selector: 'textarea', language: 'es'});
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
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
        'enableAjaxValidation' => false,
            /* 'clientOptions' => array(
              'validateOnSubmit' => true,) */
    ));
    ?>
    <h3>Acciones</h3>
    <?php
    echo CHtml::submitButton('Guardar cambios', array(
        'submit' => array('update', 'id' => $model->id_propuesta),
            /* 'confirm' => '¿Seguro que desea enviar la propuesta a revisión?, después ya no podrá editarla'
              // or you can use 'params'=>array('id'=>$id) */
            )
    );
    ?>
    <?php
    echo CHtml::submitButton('Enviar a revisión', array(
        'submit' => array('enviaARevision', 'id' => $model->id_propuesta),
        'confirm' => '¿Seguro que desea enviar la propuesta a revisión?, después ya no podrá editarla'
            // or you can use 'params'=>array('id'=>$id)
            )
    );
    ?>
    <p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

    <?php echo $form->errorSummary($model); ?>
    <div class="row buttons">

    </div>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'attributes' => array(
            'id_propuesta',
            array('name' => 'id_propuesta_padre',
                'value' => $model->id_propuesta_padre,
                'visible' => $model->id_propuesta_padre ? true : false),
            'id_proceso',
            array('name' => 'titulo',
                'type' => 'raw',
            ),
            array('name' => 'estado',
                'value' => $model->estado0->nombre),
            'cant_participantes',
            /* array('name' => 'Participantes',
              'type' => 'raw',
              'value' => $tabla), */
            array('name' => 'usuario_creador',
                'value' => $model->usuarioCreador->nombre . ' ' . $model->usuarioCreador->apellido),
            'fecha_creacion',
        ),
    ));
    ?>
    <h1>Detalles de la propuesta</h1>
    <div class="row">
        <?php echo $form->labelEx($model, 'nombre_empresa'); ?>
        <?php echo $form->textField($model, 'nombre_empresa', array('size' => 90)); ?>
        <?php echo $form->error($model, 'nombre_empresa'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'nombre_responsable'); ?>
        <?php echo $form->textField($model, 'nombre_responsable', array('size' => 90)); ?>
        <?php echo $form->error($model, 'nombre_responsable'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'cargo_responsable'); ?>
        <?php echo $form->textField($model, 'cargo_responsable', array('size' => 90)); ?>
        <?php echo $form->error($model, 'cargo_responsable'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'objetivos'); ?>
        <?php echo $form->textArea($model, 'objetivos'); ?>
        <?php echo $form->error($model, 'objetivos'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'objetivos_especificos'); ?>
        <?php echo $form->textArea($model, 'objetivos_especificos'); ?>
        <?php echo $form->error($model, 'objetivos_especificos'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'plan_trabajo'); ?>
        <?php echo $form->textArea($model, 'plan_trabajo'); ?>
        <?php echo $form->error($model, 'plan_trabajo'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'justificacion'); ?>
        <?php echo $form->textArea($model, 'justificacion'); ?>
        <?php echo $form->error($model, 'justificacion'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'metodologia'); ?>
        <?php echo $form->textArea($model, 'metodologia'); ?>
        <?php echo $form->error($model, 'metodologia'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'trabajos_simi'); ?>
        <?php echo $form->textArea($model, 'trabajos_simi'); ?>
        <?php echo $form->error($model, 'trabajos_simi'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'bibliografia'); ?>
        <?php echo $form->textArea($model, 'bibliografia'); ?>
        <?php echo $form->error($model, 'bibliografia'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'adjunto'); ?>
        <?php echo $form->fileField($model, 'adjunto');?> <?php if($model->adjunto)echo CHtml::link('Descargar', array('download', 'id' => $model->adjunto,)) ; ?>
        <?php echo $form->error($model, 'adjunto'); ?>
    </div>


    <div class="row buttons">
        <?php
        echo CHtml::submitButton('Guardar cambios', array(
            'submit' => array('update', 'id' => $model->id_propuesta),
                /* 'confirm' => '¿Seguro que desea enviar la propuesta a revisión?, después ya no podrá editarla'
                  // or you can use 'params'=>array('id'=>$id) */
                )
        );
        ?>
        <?php
        echo CHtml::submitButton('Enviar a revisión', array(
            'submit' => array('enviaARevision', 'id' => $model->id_propuesta),
            'confirm' => '¿Seguro que desea enviar la propuesta a revisión?, después ya no podrá editarla'
                // or you can use 'params'=>array('id'=>$id)
                )
        );
        ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
