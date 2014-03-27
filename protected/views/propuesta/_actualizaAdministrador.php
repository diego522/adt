<script>
    tinymce.init({selector: 'textarea', language: 'es'});
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

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'propuesta-form',
        'enableAjaxValidation' => true,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
        'clientOptions' => array(
            'validateOnSubmit' => true,)
    ));
    ?>
    <h3>Acciones</h3>
    <?php echo CHtml::submitButton('Actualizar'); ?>

    <p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

    <?php echo $form->errorSummary($model); ?>
    <div class="row buttons">

    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'titulo'); ?>
        <?php echo $form->textField($model, 'titulo', array('size' => 90,)); ?>
        <?php echo $form->error($model, 'titulo'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'descripcion'); ?>
        <?php echo $form->textArea($model, 'descripcion'); ?>
        <?php echo $form->error($model, 'descripcion'); ?>
    </div>
    <?php if ($model->id_propuesta != '') { ?>
        <div class="row">
            <?php echo $form->labelEx($model, 'id_propuesta_padre'); ?>
            <?php echo $model->id_propuesta_padre; ?>
            <?php echo $form->error($model, 'id_propuesta_padre'); ?>
        </div>

    <?php } ?>
    <?php if (!$model->isNewRecord) { ?>
        <div class="row">
            <?php echo $form->labelEx($model, 'estado'); ?>
            <?php echo $form->dropDownList($model, 'estado', CHtml::listData(Estado::model()->findAll('id_tipo_estado=' . TipoEstado::$PROPUESTA . ' order by orden ASC'), 'id_estado', 'nombre'), array('empty' => 'Ninguno')); ?> 
            <?php echo $form->error($model, 'estado'); ?>
        </div>
    <?php } ?>
    <?php if (!$model->isNewRecord) { ?>
        <div class="row">
            <?php echo $form->labelEx($model, 'usuario_creador'); ?>
            <?php echo $form->dropDownList($model, 'usuario_creador', CHtml::listData(Usuario::model()->findAll('id_rol in (' . Rol::$PROFESOR . ',' . Rol::$ADMINISTRADOR . ',' . Rol::$SUPER_USUARIO . ') order by nombre ASC'), 'id_usuario', 'nombre'), array('empty' => 'Ninguno')); ?> 
            <?php echo $form->error($model, 'usuario_creador'); ?>
        </div>
    <?php } ?>
    <?php if (!$model->isNewRecord) { ?>
        <div class="row">
            <?php echo $form->labelEx($model, 'fecha_creacion'); ?>
            <?php echo $model->fecha_creacion; ?>
        </div>
    <?php } ?>
    <?php if (!$model->isNewRecord) { ?>
        <div class="row">
            <?php echo $form->labelEx($model, 'id_proceso'); ?>
            <?php echo $model->id_proceso; ?>
            <?php echo $form->error($model, 'id_proceso'); ?>
        </div>
    <?php } ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'cant_participantes'); ?>
        <?php
        echo $form->dropDownList($model, 'cant_participantes', array(
            '1' => '1',
            '2' => '2',
        ));
        ?> 

        <?php echo $form->error($model, 'cant_participantes'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'participantes'); ?>
        <?php
        $tabla = "<table>";
        $tabla.="<tr>  <td>Rut</td> <td>Nombre</td> <td>Email</td> </tr>";
        // $model = $this->loadModel($model->id_propuesta);
        $propuestasInscritas = $model->propuestaInscritas;
        foreach ($propuestasInscritas as $prop) {
            $usuario = $prop->usuario0;
            $tabla.="<tr>  <td>" . $usuario->username . "-" . $usuario->dv . "</td> <td>" . $usuario->nombre . "</td> <td>" . $usuario->email . "</td> </tr>";
        }

        $tabla.="</table>";
        echo $tabla;
        ?>
    </div>

    <h1>Detalles de la propuesta</h1>
    <div class="row">
        <?php echo $form->labelEx($model, 'nombre_empresa'); ?>
        <?php echo $form->textField($model, 'nombre_empresa', array('size' => 90)); ?>
        <?php echo $form->error($model, 'nombre_empresa'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'nombre_responsable'); ?>
        <?php echo $form->textField($model, 'nombre_responsable', array('size' => 90)); ?>
        <?php echo $form->error($model, 'nombre_responsable'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'cargo_responsable'); ?>
        <?php echo $form->textField($model, 'cargo_responsable', array('size' => 90)); ?>
        <?php echo $form->error($model, 'cargo_responsable'); ?>
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
    <div class="row">
        <?php echo $form->labelEx($model, 'plan_trabajo'); ?>
        <?php echo $form->textArea($model, 'plan_trabajo'); ?>
        <?php echo $form->error($model, 'plan_trabajo'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'justificacion'); ?>
        <?php echo $form->textArea($model, 'justificacion'); ?>
        <?php echo $form->error($model, 'justificacion'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'metodologia'); ?>
        <?php echo $form->textArea($model, 'metodologia'); ?>
        <?php echo $form->error($model, 'metodologia'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'trabajos_simi'); ?>
        <?php echo $form->textArea($model, 'trabajos_simi'); ?>
        <?php echo $form->error($model, 'trabajos_simi'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'bibliografia'); ?>
        <?php echo $form->textArea($model, 'bibliografia'); ?>
        <?php echo $form->error($model, 'bibliografia'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'comentarios'); ?>
        <?php echo $form->textArea($model, 'comentarios'); ?>
        <?php echo $form->error($model, 'comentarios'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'adjunto'); ?>
        <?php echo $form->fileField($model, 'adjunto'); ?>
        <?php echo $form->error($model, 'adjunto'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton('Actualizar'); ?>

    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
<?php
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target' => 'a#inline',
    'config' => array(
        'scrolling' => 'no',
        'titleShow' => true,
    ),
        )
);
?>