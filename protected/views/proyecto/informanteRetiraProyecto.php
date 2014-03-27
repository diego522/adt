<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */
/* @var $form CActiveForm */
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'proyecto-form',
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,)
        ));
?>

<div class="form">
    <h1>Registro de fecha retiro de informe - Profesor Informante</h1>
    <p>
        Ésta es la fecha real en la que el profesor informante <b><?php
            echo $model->profInformante->nombre;
            ?></b> retiró el informe para revisarlo.
    </p>

    <div class="row">
        <?php echo $form->labelEx($model, 'fecha_entrega_a_informante'); ?>
        <?php
        $this->widget(
                'ext.jui.EJuiDateTimePicker', array(
            'model' => $model,
            'attribute' => 'fecha_entrega_a_informante',
            'language' => 'es', //default Yii::app()->language
            'mode' => 'datetime', //'datetime' or 'time' ('datetime' default)
            'options' => array(
                'dateFormat' => 'dd/mm/yy',
                'timeFormat' => 'hh:mm', //'hh:mm tt' default
            ),)
        );
        ?>
        <?php echo $form->error($model, 'fecha_entrega_a_informante'); ?>
    </div>
    
    
    <div class="row buttons">
        <?php echo CHtml::submitButton('Guardar Cambios'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>