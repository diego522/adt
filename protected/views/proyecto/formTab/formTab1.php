<?php if (Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR))) { ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'estado_actual'); ?>
        <?php echo $form->dropDownList($model, 'estado_actual', CHtml::listData(Estado::model()->findAll('id_tipo_estado=' . TipoEstado::$PROYECTO . ' order by orden ASC'), 'id_estado', 'nombre'), array('empty' => 'Ninguno')); ?> 
        <?php echo $form->error($model, 'estado_actual'); ?>
    </div>
<?php } else { ?>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'attributes' => array(
            'estado_actual',
        ),
    ));
    ?>
<?php } ?>
<?php if (Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR))) { ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'estado_avance'); ?>
        <?php echo $form->dropDownList($model, 'estado_avance', CHtml::listData(Estado::model()->findAll('id_tipo_estado=' . TipoEstado::$ESTADO_AVANCE . ' order by orden ASC'), 'id_estado', 'nombre'), array('empty' => 'Ninguno')); ?> 
        <?php echo $form->error($model, 'estado_avance'); ?>
    </div>
<?php } else { ?>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'attributes' => array(
            'estado_avance',
        ),
    ));
    ?>
<?php } ?>
<?php if (Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR))) { ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'carta_compromiso'); ?>
        <?php
        echo CHtml::activeDropDownList($model, 'carta_compromiso', array(
            '' => 'Seleccione',
            '1' => 'SI',
            '0' => 'NO',
        ));
        ?><?php echo $form->error($model, 'carta_compromiso'); ?>
    </div>
<?php } else { ?>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'attributes' => array(
            array('name' => 'carta_compromiso',
                'value' => $model->carta_compromiso ? 'SI' : 'NO'),
        ),
    ));
    ?>
<?php } ?>
<?php if (Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR))) { ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'apoyo_disenador'); ?>
        <?php
        echo CHtml::activeDropDownList($model, 'apoyo_disenador', array(
            '' => 'Seleccione',
            '1' => 'SI',
            '0' => 'NO',
            '3' => 'PARCIAL',
        ));
        ?>
        <?php echo $form->error($model, 'apoyo_disenador'); ?>
    </div>
<?php } else { ?>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'attributes' => array(
            array('name' => 'apoyo_disenador',
                'value' => $model->apoyo_disenador == '1' ? 'SI' : $model->apoyo_disenador == '3' ? 'PARCIAL' : 'NO'),
        ),
    ));
    ?>
<?php } ?>
<?php if (Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR))) { ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'financiado'); ?>
        <?php
        echo CHtml::activeDropDownList($model, 'financiado', array(
            '' => 'Seleccione',
            '1' => 'SI',
            '0' => 'NO',
            '3' => 'PARCIAL',
        ));
        ?>
        <?php echo $form->error($model, 'financiado'); ?>
    </div>
<?php } else { ?>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'attributes' => array(
            array('name' => 'financiado',
                'value' => $model->financiado == '1' ? 'SI' : $model->financiado == '3' ? 'PARCIAL' : 'NO'),
        ),
    ));
    ?>
<?php } ?>
<?php if (Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR))) { ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'tipo_financiamiento'); ?>
        <?php
        echo $form->textField($model, 'tipo_financiamiento');
        ?>
        <?php echo $form->error($model, 'tipo_financiamiento'); ?>
    </div>
<?php } else { ?>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'attributes' => array(
            array('name' => 'tipo_financiamiento',
                'value' => $model->tipo_financiamiento),
        ),
    ));
    ?>
<?php } ?>
