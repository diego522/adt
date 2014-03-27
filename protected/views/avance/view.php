<?php
/* @var $this AvanceController */
/* @var $model Avance */

/*$this->breadcrumbs = array(
    'Proyecto' => array('proyecto/view', 'id' => $model->id_proyecto),
    'Planificación' => array('planificacion/lista', 'idp' => $model->id_proyecto),
    'Hito' => array('planificacion/view', 'id' => $model->id_planificacion),
    'Lista de Avances' => array('listaPorPlanificiacion', 'idp' => $model->id_proyecto, 'idPlan' => $model->id_planificacion),
    'Avance'
);*/

//$this->menu = array(
   // array('label' => 'Lista de Avances', 'url' => array('lista', 'idp' => $model->id_proyecto)),
   // array('label' => 'Nuevo Avance', 'url' => array('create', 'idp' => $model->id_proyecto)),
 //   array('label' => 'Modificar Avance', 'url' => array('update', 'id' => $model->id_avance)),
   // array('label' => 'Eliminar Avance', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id_avance), 'confirm' => 'seguro que desea eliminar este avance?')),
  //  array('label' => 'Agregar Corrección', 'url' => array('correccion/createDesdeAvance', 'idp' => $model->id_proyecto, 'ida' => $model->id_avance)),
   // array('label' => 'Correcciones', 'url' => array('correccion/listaPorAvance', 'idp' => $model->id_proyecto, 'ida' => $model->id_avance)),
        /* array('label'=>'Manage Avance', 'url'=>array('admin')), */
//);
?>

<h1>Detalles del Avance </h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        /* array('name' => 'id_avance',
          ), */
        'titulo',
        /* array('name' => 'id_planificacion',
          'visible' => $model->id_planificacion ? true : false), */
        /* 'id_proyecto', */
        array('name' => 'creador',
            'value' => $model->creador0->nombre),
        array('name' => 'descripcion',
           /* 'type' => 'raw'*/),
        'fecha_creacion',
        array('name' => 'ruta_adjunto',
            'type' => 'raw',
            'value' => $model->ruta_adjunto ? CHtml::link('Descargar', array('download', 'id' => $model->ruta_adjunto,)) : 'no hay adjuntos'),
    ),
));
?>
