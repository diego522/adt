<?php

$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        array('name' => 'observaciones',
            'type' => 'raw',
        /* 'visible' => $model->observaciones ? true : false */        ),
        array('name' => 'comentarios',
            'type' => 'raw',
            'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR, Rol::$PROFESOR))),
    ),
));
?>
