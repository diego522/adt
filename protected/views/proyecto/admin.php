<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */

$this->breadcrumbs = array(
    'Proyectos' => array('index'),
    'Administrar',
);
?>

<h1>Administrar Proyectos</h1>


<div class="iconosdescarga">
    <?php echo CHtml::link('<img align="middle" title="Descarga esta vista en PDF" src="' . Yii::app()->request->baseUrl . '/images/pdf_icon.png"/>', array('listaPDF',)); ?> 
    <?php echo CHtml::link('<img align="middle" title="Descarga esta vista en EXCEL" src="' . Yii::app()->request->baseUrl . '/images/xls_icon.png"/>', array('excelConFiltros',)); ?> 
</div>



<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'proyecto-grid',
    'dataProvider' => $model->search(),
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
            'filter' => CHtml::activeDropDownList($model, 'apoyo_disenador', array(
                '' => '',
                '1' => 'SI',
                '0' => 'NO',
                '3' => 'PARCIAL',
            )),
            'value' => array($this, 'gridApoyoDesenador')),
        array('name' => 'financiado',
            'filter' => CHtml::activeDropDownList($model, 'financiado', array(
                '' => '',
                '1' => 'SI',
                '0' => 'NO',
                '3' => 'PARCIAL',
            )),
            'value' => array($this, 'gridApoyoFinanciado')),
        array('name' => 'carta_compromiso',
            'filter' => CHtml::activeDropDownList($model, 'carta_compromiso', array(
                '' => '',
                '1' => 'SI',
                '0' => 'NO',
            )),
            'value' => array($this, 'gridCartaCompromsio')),
        /* 'fecha_creacion', */
        /* array('name' => 'fecha_fin',
          'filter' => false), */
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
            'template' => '{view} {update} ',
            'buttons' => array(
                'view' => array(
                    'label' => 'Ver',
                    // 'url' => "CHtml::normalizeUrl(array('view', 'id'=>\$data->id_propuesta))",
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/ver_icon.png',
                ),
                'update' => array(
                    'label' => 'Editar',
                    //'url' => "CHtml::normalizeUrl(array('update', 'id'=>\$data->id_propuesta))",
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/edit_icon.png',
                ),
                'delete' => array(
                    'label' => 'Borrar',
                    // 'url' => "CHtml::normalizeUrl(array('delete', 'id'=>\$data->id_propuesta))",
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/delete_icon.png',
                ),
            ),
        ),
    ),
));
?>
