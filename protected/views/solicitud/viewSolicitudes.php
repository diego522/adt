<?php
/* @var $this SolicitudController */
/* @var $model Solicitud */

$this->breadcrumbs = array(
    'Proyecto' => array('proyecto/view', 'id' => $idP),
    'Solicitudes',
);
$this->menu = array(
    array('label' => 'Nueva solicitud', 'url' => array('create', 'idp' => $idP), 'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ALUMNO, Rol::$ADMINISTRADOR))),
);
?>

<h1>Solicitudes de Aplazamiento del Proyecto</h1>


<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'solicitud-grid',
    'dataProvider' => $model->viewSolicitudes($idP),
    'filter' => $model,
    'columns' => array(
        //'id_solicitud',
        //'id_tipo_solicitud',
        array('name' => 'fecha_creacion',
            'filter' => false),
        array('name' => 'creador',
            'value' => array($this, 'gridCreador'),
            'filter' => false,
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
                    //'label' => 'Ver detalles',
                    'url' => "CHtml::normalizeUrl(array('solicitud/view', 'id'=>\$data->id_solicitud))",
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/ver_icon.png',
                    'options' => array('id' => 'inline')
                // 'options' => array('class'=>'pdf'),
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
                    'label' => 'Resolver situación',
                    'name' => 'Resolver Situación',
                    'url'=>array($this, 'gridLink'),
                //'imageUrl' => Yii::app()->request->baseUrl . '/images/delete_icon.png',
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