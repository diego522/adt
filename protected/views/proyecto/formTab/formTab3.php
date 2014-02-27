
<?php if (Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR))) { ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'prof_guia'); ?>
        <?php echo $form->dropDownList($model, 'prof_guia', CHtml::listData(Usuario::model()->findAll('id_rol in(' . Rol::$PROFESOR . ',' . Rol::$ADMINISTRADOR . ',' . Rol::$SUPER_USUARIO . ') and campus=' . Yii::app()->user->getState('campus') . ' order by nombre ASC'), 'id_usuario', 'nombre'), array('empty' => 'Seleccione')); ?> 
        <?php echo $form->error($model, 'prof_guia'); ?>
    </div>
<?php } else { ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'prof_guia'); ?>
        <?php echo $model->profGuia->nombre; ?> 
        <?php echo $form->error($model, 'prof_guia'); ?>
    </div>
<?php } ?>

<?php if (Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR))) { ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'prof_informante'); ?>
        <?php echo $form->dropDownList($model, 'prof_informante', CHtml::listData(Usuario::model()->findAll('id_rol in(' . Rol::$PROFESOR . ',' . Rol::$ADMINISTRADOR . ',' . Rol::$SUPER_USUARIO . ') and campus=' . Yii::app()->user->getState('campus') . ' order by nombre ASC'), 'id_usuario', 'nombre'), array('empty' => 'Seleccione')); ?> 
        <?php echo $form->error($model, 'prof_informante'); ?>
    </div>

<?php } else { ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'prof_informante'); ?>
        <?php echo $model->profInformante ? $model->profInformante->nombre : ''; ?> 
        <?php echo $form->error($model, 'prof_informante'); ?>
    </div>
<?php } ?>
<?php if (Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR))) { ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'prof_sala'); ?>
        <?php echo $form->dropDownList($model, 'prof_sala', CHtml::listData(Usuario::model()->findAll('id_rol in(' . Rol::$PROFESOR . ',' . Rol::$ADMINISTRADOR . ',' . Rol::$SUPER_USUARIO . ') and campus=' . Yii::app()->user->getState('campus') . ' order by nombre ASC'), 'id_usuario', 'nombre'), array('empty' => 'Seleccione')); ?> 
        <?php echo $form->error($model, 'prof_sala'); ?>
    </div>

<?php } else { ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'prof_sala'); ?>
        <?php echo $model->profSala ? $model->profSala->nombre : ''; ?> 
        <?php echo $form->error($model, 'prof_sala'); ?>
    </div>
<?php } ?>
