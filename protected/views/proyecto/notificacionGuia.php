<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */
/* @var $form CActiveForm */
?>

<h1>Notificación de término de proyecto - Etapa Profesor Guía</h1>



<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'proyecto-form',
        'enableAjaxValidation' => false,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        )
    ));
    ?>


    <p>
        Al presionar el botón notificar se le informa a Jefatura de Carrera/Dirección de Escuela que el proyecto a terminado en su fase
        de revisión de profesor guía. Esto significa que el 
        proyecto está autorizado para continuar con la siguiente etapa, para lo cual Jefatura de Carrera/Dirección de Escuela
        asignará un profesor informante.

        <br/>
        No olvide lo siguiente:
        </p>
    <ul>
        <li>El profesor guía debe entregar una copia impresa y anillada del informe en secretaría de carrera.</li>
        <li>El profesor guía debe registrar la evaluación del desarrollo del proyecto,  

            la cual puede realizar en:<br/>

            <b>Mis proyectos > Proyecto seleccionado > pestaña de calificaciones > Agregar calificación.</b>
        </li>
    </ul>
 
<?php echo $form->errorSummary($model); ?>

<div class="row">
    <?php echo $form->labelEx($model, 'comentario_guia'); ?> (opcionales e internos para Dirección de Escuela/Jefatura de Carrera)<br/>
    <?php echo $form->textArea($model, 'comentario_guia', array('rows' => 6, 'cols' => 50)); ?>
    <?php echo $form->error($model, 'comentario_guia'); ?>
</div>





<div class="row buttons">
    <?php echo CHtml::submitButton('Notificar'); ?>
</div>

<?php $this->endWidget(); ?>


</div><!-- form -->
