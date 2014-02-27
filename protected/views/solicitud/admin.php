<?php
/* @var $this SolicitudController */
/* @var $model Solicitud */

$this->breadcrumbs = array(
    'Solicitudes' => array('admin'),
    'Administrar',
);
?>

<h1>Administrar Solicitudes de Aplazamiento</h1>


<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'solicitud-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id_solicitud',
        //'id_tipo_solicitud',
        array('name'=>'fecha_creacion',
            'filter'=>false),
        array('name' => 'creador',
            'value' => array($this, 'gridCreador'),
            'filter' => false,
            //'filter' => CHtml::listData(Usuario::model()->findAll('id_rol in(' . Rol::$PROFESOR . ',' . Rol::$ADMINISTRADOR . ',' . Rol::$SUPER_USUARIO . ') and campus=' . Yii::app()->user->getState('campus') . ' order by nombre ASC'), 'id_usuario', 'nombre'),
        ),
        array('header' => 'Proyecto',
            'value' => array($this, 'gridProyecto'),
            'type' => 'raw'),
        //'motivo',
        array('name' => 'estado',
            'value' => array($this, 'gridEstado'),
            'filter' => CHtml::listData(Estado::model()->findAll('id_tipo_estado=' . TipoEstado::$SOLICITUD), 'id_estado', 'nombre'),
        ),
        /*
          'id_proyecto',
         */
        array(
            'class' => 'CButtonColumn',
            'template' => '{view} {update} {delete} {resolver}',
            'buttons' => array(
                'view' => array(
                    'label' => 'Ver',
                    'url' => "CHtml::normalizeUrl(array('solicitud/view', 'id'=>\$data->id_solicitud))",
                    //'imageUrl' => Yii::app()->request->baseUrl . '/images/view.png',
                    'options' => array('id' => 'inline'),
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
                'resolver' => array(
                    'label' => 'Resolver Situación',
                    'url' => "CHtml::normalizeUrl(array('solicitud/resolverSituacion', 'id'=>\$data->id_solicitud))",
                //'imageUrl' => Yii::app()->request->baseUrl . '/images/view.png',
                // 'options' => array('id' => 'inline')
                // 'options' => array('class'=>'pdf'),
                ),
            ),
        ),
    ),
));
?>
<?php
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target' => 'a#inline',
    'config' => array(
        'scrolling' => 'no',
        'titleShow' => false,
    // 'onComplete' => 'function(){tinyMCE_setup();}',
    ),
        )
);
?>