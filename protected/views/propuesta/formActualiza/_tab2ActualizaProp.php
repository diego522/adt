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
