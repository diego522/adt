<?php
/* @var $this DefensaController */
/* @var $model Defensa */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'defensa-form',
        'enableAjaxValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        )
    ));
    ?>

    <p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->errorSummary($modelProyecto); ?>

    <div class="row">
        <?php echo $form->labelEx($modelProyecto, 'prof_sala'); ?>
        <?php echo $form->dropDownList($modelProyecto, 'prof_sala', CHtml::listData(Usuario::model()->findAll('id_rol in(' . Rol::$PROFESOR . ',' . Rol::$ADMINISTRADOR . ',' . Rol::$SUPER_USUARIO . ') and campus=' . Yii::app()->user->getState('campus') . ' order by nombre ASC'), 'id_usuario', 'nombre'), array('empty' => 'Seleccione')); ?> 
        <?php echo $form->error($modelProyecto, 'prof_sala'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'fecha_programacion'); ?>
        <?php
        $this->widget(
                'ext.jui.EJuiDateTimePicker', array(
            'model' => $model,
            'attribute' => 'fecha_programacion',
            'language' => Yii::app()->language, //default Yii::app()->language
            'mode' => 'datetime', //'datetime' or 'time' ('datetime' default)
            'options' => array(
                'dateFormat' => 'dd/mm/yy',
                'timeFormat' => 'hh:mm', //'hh:mm tt' default
            ),)
        );
        ?>
        <?php echo $form->error($model, 'fecha_programacion'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'lugar'); ?>
        <?php echo $form->textField($model, 'lugar', array('size' => 50, 'maxlength' => 2000)); ?>
        <?php echo $form->error($model, 'lugar'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'observaciones'); ?>
        <?php echo $form->textArea($model, 'observaciones', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'observaciones'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar y notificar' : 'Guardar cambios'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->