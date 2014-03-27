<?php
/* @var $this EvaluacionProyectoGuiaController */
/* @var $model EvaluacionProyectoGuia */
?>

<h1>Detalle de la Evaluación del Proyecto Profesor Guía </h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        //'id_evaluacion_proyecto_guia',
        //'id_evaluacion_proyecto_guia_padre',
        array('name' => 'id_proyecto',
            'value' => $model->idProyecto->idPropuesta->titulo),
        array('name' => 'id_alumno',
            'value' => $model->idAlumno->nombre),
         array('label' => 'Profesor Guía',
            'value' => $model->idProyecto->profGuia->nombre),
        //'id_creador',
        array('label'=>'Promedio',
            'value'=>$model->obtienePromedio()),
        'fecha_actualizacion',
    ),
));
?>
<h3>Items evaluados</h3>
<?php


$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        array('name'=>'cumple_objetivo','value'=>  $model->cumple_objetivo==1?'SI':'NO'),
        array('name'=>'desarrollo_cumple_plazo','value'=>  Utilidades::$arrayPuntosEvaluacion[$model->desarrollo_cumple_plazo]),
        array('name'=>'desarrollo_manifiesta_iniciativa','value'=>  Utilidades::$arrayPuntosEvaluacion[$model->desarrollo_manifiesta_iniciativa]),
        array('name'=>'desarrollo_desarrolla_conocimiento','value'=>  Utilidades::$arrayPuntosEvaluacion[$model->desarrollo_desarrolla_conocimiento]),
        array('name'=>'informe_destaca_importante','value'=>  Utilidades::$arrayPuntosEvaluacion[$model->informe_destaca_importante]),
        array('name'=>'informe_expone_claramente','value'=>  Utilidades::$arrayPuntosEvaluacion[$model->informe_expone_claramente]),
        array('name'=>'informe_bien_estructurado','value'=>  Utilidades::$arrayPuntosEvaluacion[$model->informe_bien_estructurado]),
        array('name'=>'informe_adecuada_bibliografia','value'=>  Utilidades::$arrayPuntosEvaluacion[$model->informe_adecuada_bibliografia]),
        array('name'=>'informe_plantea_opinion','value'=>  Utilidades::$arrayPuntosEvaluacion[$model->informe_plantea_opinion]),
        array('name'=>'producto_ajusta_requerimiento','value'=>  Utilidades::$arrayPuntosEvaluacion[$model->producto_ajusta_requerimiento]),
        array('name'=>'producto_interfaz_adecuada','value'=>  Utilidades::$arrayPuntosEvaluacion[$model->producto_interfaz_adecuada]),
        array('name'=>'producto_robustez','value'=>  Utilidades::$arrayPuntosEvaluacion[$model->producto_robustez]),
        array('name'=>'producto_documentacion_completa','value'=>  Utilidades::$arrayPuntosEvaluacion[$model->producto_documentacion_completa]),
        array('name'=>'producto_especifica_proceso','value'=>  Utilidades::$arrayPuntosEvaluacion[$model->producto_especifica_proceso]),
    // 'comentarios',
    ),
));
?>
