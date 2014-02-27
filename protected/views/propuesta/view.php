<?php
/* @var $this PropuestaController */
/* @var $model Propuesta */

$this->breadcrumbs = array(
    'Propuestas' => array('index'),
    $model->titulo,
);

$this->menu = array(
    array('label' => 'Modificar Propuesta', 'url' => array('update', 'id' => $model->id_propuesta), 'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$PROFESOR, Rol::$ADMINISTRADOR))),
    array('label' => 'Eliminar Propuesta', 'url' => '#', 'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR)), 'linkOptions' => array('submit' => array('delete', 'id' => $model->id_propuesta), 'confirm' => 'Seguro que desea eliminar esta propuesta?, borrará todo lo asociado a ella')),
    array('label' => 'Administrar Propuestas', 'url' => array('admin'), 'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR))),
    array('label' => 'Inscribir Propuesta', 'url' => array('inscribe', 'id' => $model->id_propuesta,), 'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ALUMNO)) && $model->estado == Estado::$PROPUESTA_DISPONIBLE ? true : false),
);
?>

<h1>Detalle de la Propuesta de Tema </h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        //'id_propuesta',
        array('name' => 'titulo',
            'type' => 'raw',
        ), array('name' => 'descripcion',
            'type' => 'raw',
        ),
        array('name' => 'estado',
            'value' => $model->estado0->nombre),
        array('name' => 'usuario_creador',
            'value' => $model->usuarioCreador->nombre . ' ' . $model->usuarioCreador->apellido),
        'fecha_creacion',
        'cant_participantes',
    ),
));
?>
