<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'proyecto-form',
        'enableAjaxValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,)
    ));
    ?>

    <p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php
    $this->widget('CTabView', array(
        'tabs' => array(
            'tab1' => array(
                'title' => 'Estado Actual',
                'view' => 'formTab/formTab1',
                'data' => array('model' => $model, 'form' => $form),
            ),
            'tab2' => array(
                'title' => 'Fechas',
                'view' => 'formTab/formTab2',
                'data' => array('model' => $model, 'form' => $form),
            ),
            'tab3' => array(
                'title' => 'Profesores Responsables',
                'view' => 'formTab/formTab3',
                'data' => array('model' => $model, 'form' => $form),
            ),
//            'tab4' => array(
//                'title' => 'Calificaciones',
//                'view' => 'formTab/formTab4',
//                'data' => array('model' => $model, 'form' => $form)
//            ),
        ),
    ));
    ?>





    <div class="row buttons">
        <?php echo CHtml::submitButton('Guardar Cambios'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->