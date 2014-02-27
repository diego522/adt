<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */
/* @var $form CActiveForm */
?>

<h1>Notificación reprobación de proyecto de título</h1>


<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'proyecto-form',
        'enableAjaxValidation' => false,
            /* 'clientOptions' => array(
              'validateOnSubmit' => true,) */
    ));
    ?>

    <p>
        La notificación debe ser realizada cuando el proyecto se encuentre en condiciones para que sea 
        reprobado.<br/> En este paso el sistema impide la continuación del proyecto y 
        envía notificaciones automáticas a los involucrados y a jefatura de 
        carrera.
        <br/>
        (El sistema notifica automáticamente a los involucrados)
    </p>
    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'comentario_reprobacion'); ?>
        <?php echo $form->textArea($model, 'comentario_reprobacion', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'comentario_reprobacion'); ?>
    </div> 

    <div class="row buttons">
        <?php echo CHtml::submitButton('Reprobar'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
