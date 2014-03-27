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
        'clientOptions' => array(
            'validateOnSubmit' => true,)
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'titulo'); ?>
        <?php echo $form->textField($model, 'titulo', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'titulo'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'descripcion'); ?>
        <?php
        $this->widget('application.extensions.tinymce.ETinyMce', array(
            'model' => $model,
            'attribute' => 'descripcion',
            'editorTemplate' => 'full',
            'htmlOptions' => array('rows' => 6, 'cols' => 50, 'style' => 'width:500px;height:200px;', 'class' => 'tinymce'),
            'options' => array(
                /* 'rows' => 1,
                  'cols' => 1, */
                'theme_advanced_buttons1' =>
                'undo,redo,|,bold,italic,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,outdent, indent,|,advhr,|,sub,sup,|,bullist,numlist,|,formatselect,fontselect,fontsizeselect,|,cut,copy,paste,pastetext,pasteword,|,search,replace,',
                'theme_advanced_buttons2' => 'tablecontrols,|,removeformat,visualaid,',
                'theme_advanced_buttons3' => '',
                'theme_advanced_buttons4' => '',
                'theme_advanced_toolbar_location' => 'top',
                'theme_advanced_toolbar_align' => 'left',
                'theme_advanced_statusbar_location' => 'none',
                'theme_advanced_font_sizes' => "10=10pt,11=11pt,12=12pt,13=13pt,14=14pt,
                  15=15pt,16=16pt,17=17pt,18=18pt,19=19pt,20=20pt",
            )
        ));
        ?><?php echo $form->error($model, 'descripcion'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'id_propuesta_padre'); ?>
        <?php echo $form->textField($model, 'id_propuesta_padre'); ?>
        <?php echo $form->error($model, 'id_propuesta_padre'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'estado'); ?>
        <?php echo $form->textField($model, 'estado'); ?>
        <?php echo $form->error($model, 'estado'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'estado_presentacion'); ?>
        <?php echo $form->textField($model, 'estado_presentacion'); ?>
        <?php echo $form->error($model, 'estado_presentacion'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'usuario_creador'); ?>
        <?php echo $form->textField($model, 'usuario_creador'); ?>
        <?php echo $form->error($model, 'usuario_creador'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'fecha_creacion'); ?>
        <?php echo $form->textField($model, 'fecha_creacion'); ?>
        <?php echo $form->error($model, 'fecha_creacion'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'fecha_resolucion'); ?>
        <?php echo $form->textField($model, 'fecha_resolucion'); ?>
        <?php echo $form->error($model, 'fecha_resolucion'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'fecha_resolucion_presentacion'); ?>
        <?php echo $form->textField($model, 'fecha_resolucion_presentacion'); ?>
        <?php echo $form->error($model, 'fecha_resolucion_presentacion'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'fecha_presentacion'); ?>
        <?php echo $form->textField($model, 'fecha_presentacion'); ?>
        <?php echo $form->error($model, 'fecha_presentacion'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'fecha_presenta_propuesta'); ?>
        <?php echo $form->textField($model, 'fecha_presenta_propuesta'); ?>
        <?php echo $form->error($model, 'fecha_presenta_propuesta'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'id_proceso'); ?>
        <?php echo $form->textField($model, 'id_proceso'); ?>
        <?php echo $form->error($model, 'id_proceso'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'observaciones'); ?>
        <?php
        $this->widget('application.extensions.tinymce.ETinyMce', array(
            'model' => $model,
            'attribute' => 'observaciones',
            'editorTemplate' => 'full',
            'htmlOptions' => array('rows' => 6, 'cols' => 50, 'style' => 'width:300px;height:200px;', 'class' => 'tinymce'),
            'options' => array(
                //'width' => '100px',
                'theme_advanced_buttons1' =>
                'undo,redo,|,bold,italic,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,outdent, indent,|,advhr,|,sub,sup,|,bullist,numlist,|,formatselect,fontselect,fontsizeselect,|,cut,copy,paste,pastetext,pasteword,|,search,replace,',
                'theme_advanced_buttons2' => 'tablecontrols,|,removeformat,visualaid,',
                'theme_advanced_buttons3' => '',
                'theme_advanced_buttons4' => '',
                'theme_advanced_toolbar_location' => 'top',
                'theme_advanced_toolbar_align' => 'left',
                'theme_advanced_statusbar_location' => 'none',
                'theme_advanced_font_sizes' => "10=10pt,11=11pt,12=12pt,13=13pt,14=14pt,
                  15=15pt,16=16pt,17=17pt,18=18pt,19=19pt,20=20pt",
            )
        ));
        ?><?php echo $form->error($model, 'observaciones'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'objetivos'); ?>
        <?php
        $this->widget('application.extensions.tinymce.ETinyMce', array(
            'model' => $model,
            'attribute' => 'objetivos',
            'editorTemplate' => 'full',
            'htmlOptions' => array('rows' => 6, 'cols' => 50, 'style' => 'width:500px;height:200px;', 'class' => 'tinymce'),
            'options' => array(
                'width' => '100px',
                'theme_advanced_buttons1' =>
                'undo,redo,|,bold,italic,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,outdent, indent,|,advhr,|,sub,sup,|,bullist,numlist,|,formatselect,fontselect,fontsizeselect,|,cut,copy,paste,pastetext,pasteword,|,search,replace,',
                'theme_advanced_buttons2' => 'tablecontrols,|,removeformat,visualaid,',
                'theme_advanced_buttons3' => '',
                'theme_advanced_buttons4' => '',
                'theme_advanced_toolbar_location' => 'top',
                'theme_advanced_toolbar_align' => 'left',
                'theme_advanced_statusbar_location' => 'none',
                'theme_advanced_font_sizes' => "10=10pt,11=11pt,12=12pt,13=13pt,14=14pt,
                  15=15pt,16=16pt,17=17pt,18=18pt,19=19pt,20=20pt",
            )
        ));
        ?><?php echo $form->error($model, 'objetivos'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'plan_trabajo'); ?>
        <?php
        $this->widget('application.extensions.tinymce.ETinyMce', array(
            'model' => $model,
            'attribute' => 'plan_trabajo',
            'editorTemplate' => 'full',
            'htmlOptions' => array('rows' => 6, 'cols' => 50, 'style' => 'width:500px;height:200px;', 'class' => 'tinymce'),
            'options' => array(
                'width' => '100px',
                'theme_advanced_buttons1' =>
                'undo,redo,|,bold,italic,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,outdent, indent,|,advhr,|,sub,sup,|,bullist,numlist,|,formatselect,fontselect,fontsizeselect,|,cut,copy,paste,pastetext,pasteword,|,search,replace,',
                'theme_advanced_buttons2' => 'tablecontrols,|,removeformat,visualaid,',
                'theme_advanced_buttons3' => '',
                'theme_advanced_buttons4' => '',
                'theme_advanced_toolbar_location' => 'top',
                'theme_advanced_toolbar_align' => 'left',
                'theme_advanced_statusbar_location' => 'none',
                'theme_advanced_font_sizes' => "10=10pt,11=11pt,12=12pt,13=13pt,14=14pt,
                  15=15pt,16=16pt,17=17pt,18=18pt,19=19pt,20=20pt",
            )
        ));
        ?><?php echo $form->error($model, 'plan_trabajo'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'justificacion'); ?>
        <?php
        $this->widget('application.extensions.tinymce.ETinyMce', array(
            'model' => $model,
            'attribute' => 'justificacion',
            'editorTemplate' => 'full',
            'htmlOptions' => array('rows' => 6, 'cols' => 50, 'style' => 'width:500px;height:200px;', 'class' => 'tinymce'),
            'options' => array(
                'width' => '100px',
                'theme_advanced_buttons1' =>
                'undo,redo,|,bold,italic,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,outdent, indent,|,advhr,|,sub,sup,|,bullist,numlist,|,formatselect,fontselect,fontsizeselect,|,cut,copy,paste,pastetext,pasteword,|,search,replace,',
                'theme_advanced_buttons2' => 'tablecontrols,|,removeformat,visualaid,',
                'theme_advanced_buttons3' => '',
                'theme_advanced_buttons4' => '',
                'theme_advanced_toolbar_location' => 'top',
                'theme_advanced_toolbar_align' => 'left',
                'theme_advanced_statusbar_location' => 'none',
                'theme_advanced_font_sizes' => "10=10pt,11=11pt,12=12pt,13=13pt,14=14pt,
                  15=15pt,16=16pt,17=17pt,18=18pt,19=19pt,20=20pt",
            )
        ));
        ?><?php echo $form->error($model, 'justificacion'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'adjunto'); ?>
        <?php echo $form->textField($model, 'adjunto'); ?>
        <?php echo $form->error($model, 'adjunto'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'metodologia'); ?>
        <?php
        $this->widget('application.extensions.tinymce.ETinyMce', array(
            'model' => $model,
            'attribute' => 'metodologia',
            'editorTemplate' => 'full',
            'htmlOptions' => array('rows' => 6, 'cols' => 50, 'style' => 'width:500px;height:200px;', 'class' => 'tinymce'),
            'options' => array(
                'width' => '100px',
                'theme_advanced_buttons1' =>
                'undo,redo,|,bold,italic,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,outdent, indent,|,advhr,|,sub,sup,|,bullist,numlist,|,formatselect,fontselect,fontsizeselect,|,cut,copy,paste,pastetext,pasteword,|,search,replace,',
                'theme_advanced_buttons2' => 'tablecontrols,|,removeformat,visualaid,',
                'theme_advanced_buttons3' => '',
                'theme_advanced_buttons4' => '',
                'theme_advanced_toolbar_location' => 'top',
                'theme_advanced_toolbar_align' => 'left',
                'theme_advanced_statusbar_location' => 'none',
                'theme_advanced_font_sizes' => "10=10pt,11=11pt,12=12pt,13=13pt,14=14pt,
                  15=15pt,16=16pt,17=17pt,18=18pt,19=19pt,20=20pt",
            )
        ));
        ?><?php echo $form->error($model, 'metodologia'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'trabajos_simi'); ?>
        <?php
        $this->widget('application.extensions.tinymce.ETinyMce', array(
            'model' => $model,
            'attribute' => 'trabajos_simi',
            'editorTemplate' => 'full',
            'htmlOptions' => array('rows' => 6, 'cols' => 50, 'style' => 'width:500px;height:200px;', 'class' => 'tinymce'),
            'options' => array(
                'width' => '100px',
                'theme_advanced_buttons1' =>
                'undo,redo,|,bold,italic,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,outdent, indent,|,advhr,|,sub,sup,|,bullist,numlist,|,formatselect,fontselect,fontsizeselect,|,cut,copy,paste,pastetext,pasteword,|,search,replace,',
                'theme_advanced_buttons2' => 'tablecontrols,|,removeformat,visualaid,',
                'theme_advanced_buttons3' => '',
                'theme_advanced_buttons4' => '',
                'theme_advanced_toolbar_location' => 'top',
                'theme_advanced_toolbar_align' => 'left',
                'theme_advanced_statusbar_location' => 'none',
                'theme_advanced_font_sizes' => "10=10pt,11=11pt,12=12pt,13=13pt,14=14pt,
                  15=15pt,16=16pt,17=17pt,18=18pt,19=19pt,20=20pt",
            )
        ));
        ?><?php echo $form->error($model, 'trabajos_simi'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'bibliografia'); ?>
        <?php
        $this->widget('application.extensions.tinymce.ETinyMce', array(
            'model' => $model,
            'attribute' => 'bibliografia',
            'editorTemplate' => 'full',
            'htmlOptions' => array('rows' => 6, 'cols' => 50, 'style' => 'width:500px;height:200px;', 'class' => 'tinymce'),
            'options' => array(
                'width' => '100px',
                'theme_advanced_buttons1' =>
                'undo,redo,|,bold,italic,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,outdent, indent,|,advhr,|,sub,sup,|,bullist,numlist,|,formatselect,fontselect,fontsizeselect,|,cut,copy,paste,pastetext,pasteword,|,search,replace,',
                'theme_advanced_buttons2' => 'tablecontrols,|,removeformat,visualaid,',
                'theme_advanced_buttons3' => '',
                'theme_advanced_buttons4' => '',
                'theme_advanced_toolbar_location' => 'top',
                'theme_advanced_toolbar_align' => 'left',
                'theme_advanced_statusbar_location' => 'none',
                'theme_advanced_font_sizes' => "10=10pt,11=11pt,12=12pt,13=13pt,14=14pt,
                  15=15pt,16=16pt,17=17pt,18=18pt,19=19pt,20=20pt",
            )
        ));
        ?><?php echo $form->error($model, 'bibliografia'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'nombre_empresa'); ?>
        <?php echo $form->textArea($model, 'nombre_empresa', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'nombre_empresa'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'nombre_responsable'); ?>
        <?php echo $form->textArea($model, 'nombre_responsable', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'nombre_responsable'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'cargo_responsable'); ?>
        <?php echo $form->textArea($model, 'cargo_responsable', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'cargo_responsable'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'cant_participantes'); ?>
        <?php echo $form->textField($model, 'cant_participantes'); ?>
        <?php echo $form->error($model, 'cant_participantes'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'comentarios'); ?>
        <?php
        $this->widget('application.extensions.tinymce.ETinyMce', array(
            'model' => $model,
            'attribute' => 'comentarios',
            'editorTemplate' => 'full',
            'htmlOptions' => array('rows' => 6, 'cols' => 50, 'style' => 'width:500px;height:200px;', 'class' => 'tinymce'),
            'options' => array(
                'width' => '100px',
                'theme_advanced_buttons1' =>
                'undo,redo,|,bold,italic,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,outdent, indent,|,advhr,|,sub,sup,|,bullist,numlist,|,formatselect,fontselect,fontsizeselect,|,cut,copy,paste,pastetext,pasteword,|,search,replace,',
                'theme_advanced_buttons2' => 'tablecontrols,|,removeformat,visualaid,',
                'theme_advanced_buttons3' => '',
                'theme_advanced_buttons4' => '',
                'theme_advanced_toolbar_location' => 'top',
                'theme_advanced_toolbar_align' => 'left',
                'theme_advanced_statusbar_location' => 'none',
                'theme_advanced_font_sizes' => "10=10pt,11=11pt,12=12pt,13=13pt,14=14pt,
                  15=15pt,16=16pt,17=17pt,18=18pt,19=19pt,20=20pt",
            )
        ));
        ?><?php echo $form->error($model, 'comentarios'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->