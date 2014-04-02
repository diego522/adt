<?php
/* @var $this EvaluacionDefensaInformanteController */
/* @var $model EvaluacionDefensaInformante */


?>

<h1>Detalle de la  Evaluación del Profesor Informante en la Defensa </h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
       array('name' => 'id_proyecto',
            'value' => $model->idProyecto->idPropuesta->titulo),
        array('name' => 'id_alumno',
            'value' => $model->idAlumno->nombre),
         array('label' => 'Profesor Informante',
            'value' => $model->idProyecto->profInformante!=NULL?$model->idProyecto->profInformante->nombre:''),
        //'id_creador',
        array('label'=>'Promedio',
            'value'=>$model->obtienePromedio()),
        'fecha_actualizacion',
    ),
));
?>
<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        array('name' => 'general_formal', 'value' => Utilidades::$arrayPuntosEvaluacionDefensa[$model->general_formal]),
        array('name' => 'general_seguridad', 'value' => Utilidades::$arrayPuntosEvaluacionDefensa[$model->general_seguridad]),
        array('name' => 'general_uso_medios', 'value' => Utilidades::$arrayPuntosEvaluacionDefensa[$model->general_uso_medios]),
        array('name' => 'general_planifica_presentacion', 'value' => Utilidades::$arrayPuntosEvaluacionDefensa[$model->general_planifica_presentacion]),
        array('name' => 'general_material_visual', 'value' => Utilidades::$arrayPuntosEvaluacionDefensa[$model->general_material_visual]),
        array('name' => 'especifico_claridad', 'value' => Utilidades::$arrayPuntosEvaluacionDefensa[$model->especifico_claridad]),
        array('name' => 'especifico_destaca_aspectos', 'value' => Utilidades::$arrayPuntosEvaluacionDefensa[$model->especifico_destaca_aspectos]),
        array('name' => 'especifico_conclusiones', 'value' => Utilidades::$arrayPuntosEvaluacionDefensa[$model->especifico_conclusiones]),
        array('name' => 'especifico_respuestas', 'value' => Utilidades::$arrayPuntosEvaluacionDefensa[$model->especifico_respuestas]),
        array('name' => 'especifico_desempeño', 'value' => Utilidades::$arrayPuntosEvaluacionDefensa[$model->especifico_desempeño]),
    ),
));
?>
<h3>Promedio: <?php echo $model->obtienePromedio() ?></h3>
<?php
//$this->widget('zii.widgets.CDetailView', array(
//    'data' => $model,
//    'attributes' => array(
//        'comentarios',
//    ),
//));
?>
