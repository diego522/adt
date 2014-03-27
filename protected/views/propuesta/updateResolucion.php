<script>
    tinymce.init({selector: 'textarea', language: 'es'});
</script>
<script type="text/css">

</script>
<?php
Yii::app()->clientScript->registerScriptFile(
        Yii::app()->baseUrl . '/js/tinymce/tinymce.min.js'
);
Yii::app()->clientScript->registerScript('search', '
    $("#btnLeft").click(function () {
    var selectedItem = $("#rightValues option:selected");
    $("#leftValues").append(selectedItem);
    var listbox = document.getElementById("rightValues");
    for(var count=0; count < listbox.options.length; count++) {
            listbox.options[count].selected = true;
    }
});

$("#btnRight").click(function () {
    var selectedItem = $("#leftValues option:selected");
    $("#rightValues").append(selectedItem);
    var listbox = document.getElementById("rightValues");
    for(var count=0; count < listbox.options.length; count++) {
            listbox.options[count].selected = true;
    }
});

$("#rightValues").change(function () {
    var selectedItem = $("#rightValues option:selected");
    $("#txtRight").val(selectedItem.text());
    
});'
);
?>


<?php
/* @var $this PropuestaController */
/* @var $model Propuesta */

$this->breadcrumbs = array(
    'Propuestas' => array('misPropuestas'),
    substr($model->titulo, 0, 60) . '...' => array('view', 'id' => $model->id_propuesta),
    'Resolver situación',
);
?>
<?php
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target' => 'a#inline',
    'config' => array(
        'scrolling' => 'no',
        'titleShow' => true,
    ),)
);
?>
<h1>Resolver situación de la propuesta</h1>
<h3><?php echo $model->titulo; ?></h3>
<div class="iconosdescarga">
    <?php echo CHtml::link('<img align="middle" title="Descarga esta propuesta en PDF" src="' . Yii::app()->request->baseUrl . '/images/pdf_icon.png"/>' . ' Descargar Propuesta', array('verPDF', 'id' => $model->id_propuesta,)); ?>
</div> 
<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        // 'id_propuesta',
        array('name' => 'id_propuesta_padre',
            'value' => $model->id_propuesta_padre,
            'visible' => $model->id_propuesta_padre ? true : false),
        // 'id_proceso',
        /* array('name' => 'titulo',
          'type' => 'raw',
          ), */
        /* array('name' => 'descripcion',
          'type' => 'raw',), */
        // 'cant_participantes',
        array('name' => 'estado',
            'value' => $model->estado0->nombre),
        array('name' => 'Participantes',
            'type' => 'raw',
            'value' => $tabla),
        array('name' => 'usuario_creador',
            'value' => $model->usuarioCreador->nombre . ' ' . $model->usuarioCreador->apellido),
        //'fecha_creacion',
        array('name' => 'fecha_presenta_propuesta',
            'visible' => $model->fecha_presenta_propuesta ? true : false),
        array('name' => 'fecha_resolucion',
            'visible' => $model->fecha_resolucion ? true : false),
        array('name' => 'fecha_resolucion_presentacion',
            'visible' => $model->fecha_resolucion_presentacion ? true : false),
        array('name' => 'estado_presentacion',
            'visible' => $model->estado_presentacion ? true : false),
        array('name' => 'fecha_presentacion',
            'visible' => $model->fecha_presentacion ? true : false),
    ),
));
?>
<br/>

<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'propuesta-form',
        'enableAjaxValidation' => false,
            /* 'clientOptions' => array(
              'validateOnSubmit' => true,) */
    ));
    ?>
    <p class="note">Los campos con <span class="required">*</span> son requeridos.</p>
    <?php echo $form->errorSummary($model); ?>
    <div class="row buttons">
        <?php
        echo CHtml::submitButton('Guardar cambios', array(
            'submit' => array('resolverSituacion', 'id' => $model->id_propuesta),
                /* 'confirm' => '¿Seguro que desea enviar la propuesta a revisión?, después ya no podrá editarla'
                  // or you can use 'params'=>array('id'=>$id) */
                )
        );
        ?>
        <?php
        echo CHtml::submitButton('Guardar y Notificar resolución', array(
            'submit' => array('notificarResolucion', 'id' => $model->id_propuesta),
                // 'confirm' => '¿Seguro que desea enviar la propuesta a revisión?, después ya no podrá editarla'
                // or you can use 'params'=>array('id'=>$id)
                )
        );
        ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'estado'); ?>
        <?php echo $form->dropDownList($model, 'estado', CHtml::listData(Estado::model()->findAll('id_tipo_estado=' . TipoEstado::$PROPUESTA . ' order by orden ASC'), 'id_estado', 'nombre'), array('empty' => 'Seleccione')); ?> 
        <?php echo $form->error($model, 'estado'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'observaciones'); ?>
        <?php echo $form->textArea($model, 'observaciones'); ?>
        <?php echo $form->error($model, 'observaciones'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'comentarios'); ?> (internos para profesores)
        <?php echo $form->textArea($model, 'comentarios'); ?>
        <?php echo $form->error($model, 'comentarios'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'Asigna profesor guía'); ?>
        <?php echo $form->dropDownList($model, 'profesor_guia', CHtml::listData(Usuario::model()->findAll('id_rol in(' . Rol::$PROFESOR . ',' . Rol::$ADMINISTRADOR . ',' . Rol::$SUPER_USUARIO . ') and campus=' . Yii::app()->user->getState('campus') . ' order by nombre ASC'), 'id_usuario', 'nombre'), array('empty' => 'Seleccione')); ?> 
        <?php echo $form->error($model, 'profesor_guia'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'Profesor Co-Guía'); ?>
        <?php if (!$model->isNewRecord) { ?>
            <select id="leftValues" name="leftValues" size="5" multiple>
                <?php
                $profesores = Usuario::model()->findAll('id_rol in(' . Rol::$PROFESOR . ',' . Rol::$ADMINISTRADOR . ',' . Rol::$SUPER_USUARIO . ') and campus=' . Yii::app()->user->getState('campus') . ' order by nombre ASC');
                foreach ($profesores as $row) {
                    $estaPreste = false;
                    foreach ($model->coGuia as $co_ex) {
                        if ($row->id_usuario == $co_ex->id_usuario) {
                            $estaPreste = TRUE;
                        }
                    }
                    if ($estaPreste == FALSE) {
                        echo '<option selected value="' . $row->id_usuario . '">' . $row->nombre . '</option>';
                    }
                }
            }
            ?>                
        </select>

        <input type="button" id="btnLeft" value="&lt;&lt;" />
        <input type="button" id="btnRight" value="&gt;&gt;" />

        <select id="rightValues" name="rightValues[]" size="5" multiple>
            <?php
            foreach ($model->coGuia as $co_guia) {
                echo '<option selected value="' . $co_guia->id_usuario . '">' . $co_guia->nombre . '</option>';
            }
            ?>
        </select>
    </div>


    <?php if ($model->estado == Estado::$PROPUESTA_ACEPTADA_CON_OBSERVACIONES_CON_PRESENTACION) { ?>
        <div class="row">
            <?php echo $form->labelEx($model, 'estado_presentacion'); ?>
            <?php echo $form->dropDownList($model, 'estado_presentacion', CHtml::listData(Estado::model()->findAll('id_tipo_estado=' . TipoEstado::$PRESENTACION_PROPUESTA . ' order by orden ASC'), 'id_estado', 'nombre'), array('empty' => 'Seleccione')); ?> 
            <?php echo $form->error($model, 'estado_presentacion'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'fecha_presentacion'); ?>
            <?php
            $this->widget(
                    'ext.jui.EJuiDateTimePicker', array(
                'model' => $model,
                'attribute' => 'fecha_presentacion',
                'language' => 'es', //default Yii::app()->language
                'mode' => 'datetime', //'datetime' or 'time' ('datetime' default)
                'options' => array(
                    'dateFormat' => 'dd/mm/yy',
                    'timeFormat' => 'hh:mm', //'hh:mm tt' default
                ),)
            );
            ?>
            <?php echo $form->error($model, 'fecha_presentacion'); ?>

        </div>
    <?php } ?>

    <div class="row buttons">
        <?php
        echo CHtml::submitButton('Guardar cambios', array(
            'submit' => array('resolverSituacion', 'id' => $model->id_propuesta),
                /* 'confirm' => '¿Seguro que desea enviar la propuesta a revisión?, después ya no podrá editarla'
                  // or you can use 'params'=>array('id'=>$id) */
                )
        );
        ?>
        <?php
        echo CHtml::submitButton('Guardar y Notificar resolución', array(
            'submit' => array('notificarResolucion', 'id' => $model->id_propuesta),
                // 'confirm' => '¿Seguro que desea enviar la propuesta a revisión?, después ya no podrá editarla'
                // or you can use 'params'=>array('id'=>$id)
                )
        );
        ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->

