<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */
/* @var $form CActiveForm */
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'proyecto-form',
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
    'enableAjaxValidation' => false,
        /* 'clientOptions' => array(
          'validateOnSubmit' => true,) */
        ));
?>
<div class="form">
    <div class="row">
        <?php echo $form->labelEx($model, 'carta_aceptacion'); ?> formatos aceptados(<?php echo implode(',', Adjunto::$formatos_acepotados); ?>)<br/>
        <?php echo $form->fileField($model, 'carta_aceptacion'); ?> <?php if ($model->carta_aceptacion) echo CHtml::link('Descargar Adjunta', array('download', 'id' => $model->carta_aceptacion,)); ?>
        <?php echo $form->error($model, 'adjunto'); ?>
    </div>
    <div class="row buttons">
        <?php
        echo CHtml::submitButton('Guardar Carta', array(
            'submit' => array('guardaCartaAceptacion', 'id' => $model->id_proyecto),
                )
        );
        ?>
    </div>
</div><!-- form -->
<?php $this->endWidget(); ?>