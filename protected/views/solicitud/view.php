<?php
/* @var $this SolicitudController */
/* @var $model Solicitud */
?>

<h1>Detalle de la Solicitud</h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        //'id_solicitud',
        //'id_tipo_solicitud',
        array('name' => 'estado',
            'value' => $model->estado0->nombre),
        'fecha_creacion',
        array('name' => 'Proyecto',
            'value' => $link,
            'type' => 'raw'),
        array('name' => 'motivo',
            'type' => 'raw'),
        
        //array('name'=>'fecha_respuesta',),
        array('name' => 'respuesta',
            'type' => 'raw'),
    //'id_proyecto',
    ),
));
?>
