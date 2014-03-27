<?php
/* @var $this ProyectoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Proyectos',
);
?>

<h1>Lista de proyectos en los que participo</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'proyecto-grid',
    'dataProvider' => $model->searchMisProyectos(),
    'filter' => $model,
    'columns' => array(
        //'id_proyecto',
        array('header' => 'Título',
            'value' => array($this, 'gridTituloPropuesta')),
        array('name' => 'estado_actual',
            'filter' => CHtml::listData(Estado::model()->findAll('id_tipo_estado=' . TipoEstado::$PROYECTO), 'id_estado', 'nombre'),
            'value' => array($this, 'gridEstadoActual')),
        array('name' => 'estado_avance',
            'filter' => CHtml::listData(Estado::model()->findAll('id_tipo_estado=' . TipoEstado::$ESTADO_AVANCE), 'id_estado', 'nombre'),
            'value' => array($this, 'gridEstadoAvance')),
        array('name' => 'apoyo_disenador',
            'filter' => false,
            'value' => array($this, 'gridApoyoDesenador')),
//        array('name' => 'carta_compromiso',
//            'filter' => false,
//            'value' => array($this, 'gridCartaCompromsio')),
        array('header' => 'Alumnos',
            'value' => array($this, 'gridParticipantesAdmin'),
            'name' => 'nombres_alumnos',
            'type' => 'raw'),
        array('name' => 'prof_guia',
            //'filter'=>CHtml::listData(Usuario::model()->findAll('id_rol=' . TipoEstado::$AVANCE_PROYECTO), 'id_estado', 'nombre'),
            'filter' => CHtml::listData(Usuario::model()->findAll('id_rol in(' . Rol::$PROFESOR . ',' . Rol::$ADMINISTRADOR . ',' . Rol::$SUPER_USUARIO . ') and campus=' . Yii::app()->user->getState('campus') . ' order by nombre ASC'), 'id_usuario', 'nombre'),
            'value' => array($this, 'gridProfesorGuia')),
        array('name' => 'prof_informante',
            //'filter'=>CHtml::listData(Estado::model()->findAll('id_tipo_estado=' . TipoEstado::$AVANCE_PROYECTO), 'id_estado', 'nombre'),
            'filter' => CHtml::listData(Usuario::model()->findAll('id_rol in(' . Rol::$PROFESOR . ',' . Rol::$ADMINISTRADOR . ',' . Rol::$SUPER_USUARIO . ') and campus=' . Yii::app()->user->getState('campus') . ' order by nombre ASC'), 'id_usuario', 'nombre'),
            'value' => array($this, 'gridProfesorInformante')),
        array('name' => 'prof_sala',
            //'filter'=>CHtml::listData(Estado::model()->findAll('id_tipo_estado=' . TipoEstado::$AVANCE_PROYECTO), 'id_estado', 'nombre'),
            'filter' => CHtml::listData(Usuario::model()->findAll('id_rol in(' . Rol::$PROFESOR . ',' . Rol::$ADMINISTRADOR . ',' . Rol::$SUPER_USUARIO . ') and campus=' . Yii::app()->user->getState('campus') . ' order by nombre ASC'), 'id_usuario', 'nombre'),
            'value' => array($this, 'gridProfesorSala')),
        array('name' => 'periodo',
            //'filter'=>CHtml::listData(Usuario::model()->findAll('id_rol=' . TipoEstado::$AVANCE_PROYECTO), 'id_estado', 'nombre'),
            'filter' => CHtml::listData(Proceso::model()->findAll('id_campus=' . Yii::app()->user->getState('campus') . ' order by fecha_inicio ASC'), 'id_proceso', 'titulo'),
            'value' => array($this, 'gridPeriodo')),
        array(
            'class' => 'CButtonColumn',
            'template' => '{view} ',
            'buttons' => array(
                'view' => array(
                    'label' => 'Ver',
                    // 'url' => "CHtml::normalizeUrl(array('view', 'id'=>\$data->id_propuesta))",
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/ver_icon.png',
                ),
            ),
        ),
    ),
));
?>

