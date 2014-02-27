<?php
/* @var $this CorreccionController */
/* @var $model Correccion */

$this->breadcrumbs = array(
    'Proyecto' => array('proyecto/view', 'id' => $model->id_proyecto),
    'Planificación' => array('planificacion/lista', 'idp' => $model->id_proyecto),
    //'Hito'=>array('planificacion/view','id'=>$model->id_planificacion),
    //'Lista de Avances' => array('listaPorPlanificiacion', 'idp' => $model->id_proyecto,'idPlan'=>$model->id_avance),
    'Avance' => array('avance/view', 'id' => $model->id_avance,),
    'Corrección'
);

$this->menu = array(
    array('label' => 'Lista de correcciones', 'url' => array('lista', 'idp' => $model->id_proyecto)),
    array('label' => 'Nueva corrección', 'url' => array('create', 'idp' => $model->id_proyecto)),
    array('label' => 'Modificar corrección', 'url' => array('update', 'id' => $model->id_correccion)),
    array('label' => 'Eliminar Correccion', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id_correccion), 'confirm' => 'Seguro que desea eliminar esta corrección?')),
        //array('label'=>'Manage Correccion', 'url'=>array('admin')),
);
?>

<h1>Detalle de la Corrección</h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
       /* 'id_correccion',*/
        'titulo',
        /* 'id_avance', */
        /*'id_proyecto',*/
        'fecha_creacion',
        array('name' => 'creador',
            'value' => $model->creador0->nombre),
        array('name' => 'descripcion',
            'type' => 'raw'),
        array('name' => 'adjunto',
            'type' => 'raw',
            'value' => $model->adjunto ? CHtml::link('Descargar', array('download', 'id' => $model->adjunto,)) : 'no hay adjuntos'),
    ),
));
?>
