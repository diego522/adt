<h3>Detalles</h3>
<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
       /* 'id_proyecto',*/
        array('name' => 'id_proyecto_padre',
            'type'=>'raw',
            'value' => CHtml::link('Ver', array('view', 'id' => $model->id_proyecto_padre,)),
            'visible' => $model->id_proyecto_padre ? true : false),
        array('name' => 'Propuesta',
            'type' => 'raw',
            'value' => CHtml::link($model->idPropuesta->titulo, array('propuesta/view', 'id' => $model->id_propuesta))),
        array('name' => 'estado_actual',
            'value' => $model->estadoActual ? $model->estadoActual->nombre : ''),
        array('name' => 'estado_avance',
            'value' => $model->estadoAvance ? $model->estadoAvance->nombre : ''),
        array('name' => 'Participantes',
            'value' => $tabla,
            'type'=>'raw'),
        array('name' => 'apoyo_disenador',
            'value' => $model->apoyo_disenador=='1' ? 'SI' : 'NO'),
        array('name' => 'carta_compromiso',
            'value' => $model->carta_compromiso=='1' ? 'SI' : 'NO'),
        /* 'fecha_creacion', */
        'fecha_inicio',
        'fecha_fin',
        array('name'=>'Avance',
            'value'=>  Planificacion::porcentajeDeAvance($model->id_proyecto).'%'),
        array('name'=>'N° de hitos cumplidos',
            'value'=>  Planificacion::numeroDeHitosCumplidos($model->id_proyecto)),
        array('name'=>'N° de hitos pendientes',
            'value'=>  Planificacion::numeroDeHitosPendientes($model->id_proyecto)),
    ),
));
?>