<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */
/* @var $form CActiveForm */
?>

<h1>Asignación del Profesor Informante </h1>


<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'proyecto-form',
        'enableAjaxValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,)
    ));
    ?>


    <p>

    </p>
    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'prof_informante'); ?>
        <?php echo $form->dropDownList($model, 'prof_informante', CHtml::listData(Usuario::model()->findAll('id_rol in(' . Rol::$PROFESOR . ',' . Rol::$ADMINISTRADOR . ',' . Rol::$SUPER_USUARIO . ') and campus=' . Yii::app()->user->getState('campus') . ' order by nombre ASC'), 'id_usuario', 'nombre'), array('empty' => 'Seleccione')); ?> 
        <?php echo $form->error($model, 'prof_informante'); ?>
    </div>

    <p>(el sistema notificará automáticamente a los involucrados)</p>
    <div class="row">
        <?php echo $form->labelEx($model, 'fecha_max_rev_informante'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            // 'model'=>$model,
            'name' => 'fecha_max_rev_informante',
            'language' => 'es',
            'value' => $model->fecha_max_rev_informante,
            // additional javascript options for the date picker plugin
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => 'dd/mm/yy',
                'showButtonPanel' => 'true',
                'changeMonth' => 'true',
                'changeYear' => 'true',
                'constrainInput' => 'false',
            ),));
        ?>
        <?php echo $form->error($model, 'fecha_max_rev_informante'); ?><br/>
        (Considera 15 días seguidos, excepto domingos)
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Asignar al proyecto'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
