<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs = array(
    'Usuarios' => array('admin'),
    'Administrar',
);

$this->menu = array(
    //array('label'=>'List Usuario', 'url'=>array('index')),
    array('label' => 'Nuevo Usuario', 'url' => array('create')),
    array('label' => 'Importar Usuario desde INTRANET', 'url' => array('importarDesdeUBB',), 'linkOptions' => array('id' => 'inline')),
);
?>
<h1>Administrar Usuarios</h1>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'usuario-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        //'id_usuario',
        'nombre',
        array('name' => 'username'),
        //'dv',
        //'password',
        //'apellido',
        array('name' => 'id_rol',
            'value' => array($this, 'gridRol'),
            'filter' => CHtml::listData(Rol::model()->findAll(), 'id_rol', 'nombre'),
        ),
        'email',
        array(
            'class' => 'CButtonColumn',
            'template' => '{view} {update} {delete}',
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
<?php
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target' => 'a#inline',
    'config' => array(
        'scrolling' => 'no',
        'titleShow' => false,
    ),
        )
);
?>