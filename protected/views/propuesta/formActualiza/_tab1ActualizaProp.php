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



    <p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

    <?php echo $form->errorSummary($model); ?>
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
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'attributes' => array(
           // 'id_propuesta',
            /* array('name' => 'id_propuesta_padre',
              'value' => $model->id_propuesta_padre,
              'visible' => $model->id_propuesta_padre ? true : false), */
            // 'id_proceso',
            array('name' => 'titulo',
                'type' => 'raw',
            ),
            array('name' => 'estado',
                'value' => $model->estado0->nombre),
            // 'cant_participantes',
            /* array('name' => 'Participantes',
              'type' => 'raw',
              'value' => $tabla), */
            array('name' => 'usuario_creador',
                'value' => $model->usuarioCreador->nombre . ' ' . $model->usuarioCreador->apellido),
        // 'fecha_creacion',
        ),
    ));
    ?>
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



</div><!-- form -->
