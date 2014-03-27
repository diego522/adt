<?php
/* @var $this PropuestaController */
/* @var $model Propuesta */

$this->breadcrumbs=array(
	'Mis propuestas',
);


?>

<h1>Listado de propuestas en las que participo</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'propuesta-grid',
    'dataProvider' => $model->searchMisPropuestas(),
    'filter' => $model,
    'columns' => array(
       // 'id_propuesta',
        array('name' => 'estado',
            'filter' => CHtml::listData(Estado::model()->findAll('id_tipo_estado=' . TipoEstado::$PROPUESTA), 'id_estado', 'nombre'),
            'value' => array($this, 'gridEstado'),
            'type'=>'raw',
            ),
        array('name' => 'usuario_creador',
            'value' => array($this, 'gridCreador'),
            'filter' => CHtml::listData(Usuario::model()->findAll('id_rol in(' . Rol::$PROFESOR . ',' . Rol::$ADMINISTRADOR . ',' . Rol::$SUPER_USUARIO . ') and campus=' . Yii::app()->user->getState('campus') . ' order by nombre ASC'), 'id_usuario', 'nombre')),
        /* 'estado_presentacion', */
        array('type' => 'raw',
            'name' => 'nombres_alumnos',
            'value' => array($this, 'gridParticipantesAdmin'),
            //'filter' => CHtml::listData(Usuario::model()->findAll('id_rol in(' . Rol::$PROFESOR . ',' . Rol::$ADMINISTRADOR . ',' . Rol::$SUPER_USUARIO . ') and campus=' . Yii::app()->user->getState('campus') . ' order by nombre ASC'), 'id_usuario', 'nombre')
            ),
        /* 'estado_presentacion', */
        'titulo',
        /* 'descripcion', */
        array('name' => 'id_proceso',
            'value' => array($this, 'gridProceso'),
            'filter' => CHtml::listData(Proceso::model()->findAll(), 'id_proceso', 'titulo')),
        array(
            'class' => 'CButtonColumn',
            'template' => '{view} {pdf}',
            'buttons' => array(
			
                'view' => array(
                    'label' => 'Ver',
                    'url' => "CHtml::normalizeUrl(array('view', 'id'=>\$data->id_propuesta))",
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/ver_icon.png',
                ),

                'pdf' => array(
                    'label' => 'Descargar en PDF',
                    'url' => "CHtml::normalizeUrl(array('verPDF', 'id'=>\$data->id_propuesta))",
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/pdf_icon.png',
                // 'options' => array('class'=>'pdf'),
                ),
				
				
            ),
        ),
    ),
));
?>
