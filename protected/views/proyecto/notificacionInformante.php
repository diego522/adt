<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */
/* @var $form CActiveForm */
?>

<h1>Notificación de término de revisión del proyecto - Profesor Informante</h1>


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
        Sr(a). Profesor(a) se le informa que
         la notificación debe ser realizada cuando el proyecto se encuentre completamente revisado, esto implica
        el informe y la aplicación de software (si corresponde). 
        De esta manera puede ser planificada la defensa de éste.<br/>
        A continuación Dirección de Escuela/Jefatura de Carrera informa a los estudiantes que deben iniciar
        los trámites para la defensa.
        <br/>
        <br/>
        No olvide registrar la evaluación del proyecto, la cual puede realizar en:<br/>

        <b>Mis proyectos > Proyecto seleccionado > pestaña de calificaciones > agregar calificación .</b>

    </p>
    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'comentario_informante'); ?> (opcionales e internos para Dirección de Escuela/Jefatura de Carrera)<br/>
        <?php echo $form->textArea($model, 'comentario_informante', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'comentario_informante'); ?>
    </div>





    <div class="row buttons">
        <?php echo CHtml::submitButton('Notificar'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
