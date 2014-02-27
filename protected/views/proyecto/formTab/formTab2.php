<div class="row">
    <?php echo $form->labelEx($model, 'fecha_inicio'); ?>
    <?php
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'model' => $model,
        'attribute' => 'fecha_inicio',
        'language' => 'es',
        // 'value' => $model->fecha_inicio,
        // additional javascript options for the date picker plugin
        'options' => array(
            'showAnim' => 'fold',
            'dateFormat' => 'dd/mm/yy',
            'changeMonth' => 'true',
            'changeYear' => 'true',
            'constrainInput' => 'false',
        ),));
    ?>
    <?php echo $form->error($model, 'fecha_inicio'); ?>
</div>
<div class="row">
    <?php echo $form->labelEx($model, 'fecha_fin'); ?>
    <?php
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'model' => $model,
        'attribute' => 'fecha_fin',
        'language' => 'es',
        //'value' => $model->fecha_fin,
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
    <?php echo $form->error($model, 'fecha_fin'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'fecha_guia_notif_jefe_carr'); ?>
    <?php
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'model' => $model,
        'attribute' => 'fecha_guia_notif_jefe_carr',
        'language' => 'es',
        //'value' => $model->fecha_guia_notif_jefe_carr,
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
    <?php echo $form->error($model, 'fecha_guia_notif_jefe_carr'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'fecha_asigna_informante'); ?>
    <?php
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'model' => $model,
        'attribute' => 'fecha_asigna_informante',
        'language' => 'es',
        // 'value' => $model->fecha_real_entrega_rev_informante,
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

    <?php echo $form->error($model, 'fecha_asigna_informante'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'fecha_max_rev_informante'); ?>
    <?php
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'model' => $model,
        'attribute' => 'fecha_max_rev_informante',
        'language' => 'es',
        //'value' => $model->fecha_max_rev_informante,
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
    <?php echo $form->error($model, 'fecha_max_rev_informante'); ?>
</div>

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

<div class="row">
    <?php echo $form->labelEx($model, 'fecha_real_entrega_rev_informante'); ?>
    <?php
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'model' => $model,
        'attribute' => 'fecha_real_entrega_rev_informante',
        'language' => 'es',
        // 'value' => $model->fecha_real_entrega_rev_informante,
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
    <?php echo $form->error($model, 'fecha_real_entrega_rev_informante'); ?>
</div>
