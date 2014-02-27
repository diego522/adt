<?php
/* @var $this PropuestaController */
/* @var $model Propuesta */

$this->breadcrumbs = array(
    'Propuestas' => array('admin'),
    'Administrar',
);
if (Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR))) {
    $this->menu = array(
       // array('label' => 'Listado de Propuestas', 'url' => array('index')),
        array('label' => 'Nueva Propuesta', 'url' => array('create')),
    );
}


?>

<h1>Administrar Propuestas de Tema</h1>
<div class="iconosdescarga">
<?php echo CHtml::link( '<img align="middle" title="Descarga esta vista en PDF" src="' . Yii::app()->request->baseUrl . '/images/pdf_icon.png"/>', array('listaPDF',)); ?>
<?php echo CHtml::link( '<img align="middle" title="Descarga esta vista en EXCEL" src="' . Yii::app()->request->baseUrl . '/images/xls_icon.png"/>', array('excelConFiltros',)); ?>
</div>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'propuesta-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        //'id_propuesta',
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
            'template' => '{view} {update} {delete} {pdf}',
            'buttons' => array(
			
                'view' => array(
                    'label' => 'Ver',
                    'url' => "CHtml::normalizeUrl(array('view', 'id'=>\$data->id_propuesta))",
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/ver_icon.png',
                ),

                'update' => array(
                    'label' => 'Editar',
                    'url' => "CHtml::normalizeUrl(array('update', 'id'=>\$data->id_propuesta))",
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/edit_icon.png',
                ),
                'delete' => array(
                    'label' => 'Borrar',
                    'url' => "CHtml::normalizeUrl(array('delete', 'id'=>\$data->id_propuesta))",
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/delete_icon.png',
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