<?php
/* @var $this EvaluacionProyectoInformanteController */
/* @var $model EvaluacionProyectoInformante */


?>

<h1>Detalle Evaluacion del Proyecto Profesor Informante</h1>

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
            'value' => $model->idProyecto->profInformante!=NULL?$model->idProyecto->profInformante->nombre:'Sin Asignar'),
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
        array('name'=>'informe_destaca_importante','value'=>  Utilidades::$arrayPuntosEvaluacion[$model->informe_destaca_importante]),
        array('name'=>'informe_expone_claro','value'=>  Utilidades::$arrayPuntosEvaluacion[$model->informe_expone_claro]),
        array('name'=>'informe_bien_estructurado','value'=>  Utilidades::$arrayPuntosEvaluacion[$model->informe_bien_estructurado]),
        array('name'=>'informe_adecuada_bibliografia','value'=>  Utilidades::$arrayPuntosEvaluacion[$model->informe_adecuada_bibliografia]),
        array('name'=>'informe_opiniones_propias','value'=>  Utilidades::$arrayPuntosEvaluacion[$model->informe_opiniones_propias]),
        array('name'=>'informe_opiniones_propias','value'=>  Utilidades::$arrayPuntosEvaluacion[$model->informe_opiniones_propias]),
        array('name'=>'informe_aportes_personales','value'=>  Utilidades::$arrayPuntosEvaluacion[$model->informe_aportes_personales]),
        array('name'=>'informe_domina_conceptos','value'=>  Utilidades::$arrayPuntosEvaluacion[$model->informe_domina_conceptos]),
        array('name'=>'informe_domina_tecnicas','value'=>  Utilidades::$arrayPuntosEvaluacion[$model->informe_domina_tecnicas]),
        array('name'=>'informe_cumple_objetivo','value'=>  Utilidades::$arrayPuntosEvaluacion[$model->informe_cumple_objetivo]),
        array('name'=>'producto_ajusta_requerimientos','value'=>  Utilidades::$arrayPuntosEvaluacion[$model->producto_ajusta_requerimientos]),
        array('name'=>'producto_interfaz_adecuada','value'=>  Utilidades::$arrayPuntosEvaluacion[$model->producto_interfaz_adecuada]),
        array('name'=>'producto_robustez','value'=>  Utilidades::$arrayPuntosEvaluacion[$model->producto_robustez]),
        array('name'=>'producto_documentacion','value'=>  Utilidades::$arrayPuntosEvaluacion[$model->producto_documentacion]),
        array('name'=>'producto_especifica_proceso','value'=>  Utilidades::$arrayPuntosEvaluacion[$model->producto_especifica_proceso]),
    // 'comentarios',
    ),
));
?>


