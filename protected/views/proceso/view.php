<?php
/* @var $this ProcesoController */
/* @var $model Proceso */

$this->breadcrumbs = array(
    'Periodos' => array('index'),
);

$this->menu = array(
    array('label' => 'Listar periodos', 'url' => array('index')),
    array('label' => 'Nuevo periodo', 'url' => array('create')),
    array('label' => 'Actualizar periodo', 'url' => array('update', 'id' => $model->id_proceso)),
    array('label' => 'Eliminar periodo', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id_proceso), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Administrar periodo', 'url' => array('admin')),
);
?>

<h1>Ver Periodo</h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id_proceso',
        'titulo',
        'fecha_creacion',
        'fecha_inicio',
        'fecha_fin',
        array('name' => 'estado',
            'value' => $model->estado0->nombre),
        'fecha_fin_proyecto',
    ),
));
?>
