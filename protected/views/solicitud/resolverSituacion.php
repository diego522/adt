<?php
/* @var $this SolicitudController */
/* @var $model Solicitud */

?>

<h1>Resolver situación de la Solicitud</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id_solicitud',
		//'id_tipo_solicitud',
            array('name'=>'estado',
                    'value'=>$model->estado0->nombre),
		'fecha_creacion',
		array('name'=>'Proyecto',
                    'value'=>$link,
                    'type'=>'raw'),
		array('name'=>'motivo',
                    'type'=>'raw'),
		
		
		//'id_proyecto',
	),
)); ?>

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
/* @var $this SolicitudController */
/* @var $model Solicitud */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'solicitud-form',
        'enableAjaxValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,)
    ));
    ?>

    <p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'estado'); ?>
        <?php echo $form->dropDownList($model, 'estado', CHtml::listData(Estado::model()->findAll('id_tipo_estado='.TipoEstado::$SOLICITUD), 'id_estado', 'nombre')) ?>
        <?php echo $form->error($model, 'estado'); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model, 'respuesta'); ?>
        <?php echo $form->textArea($model, 'respuesta', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'respuesta'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar cambios' : 'Guardar cambios'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->