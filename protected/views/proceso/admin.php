<?php
/* @var $this ProcesoController */
/* @var $model Proceso */

$this->breadcrumbs = array(
    'Periodo' => array('index'),
    'Administrar',
);

$this->menu = array(
    // array('label' => 'Lista de Periodos', 'url' => array('index')),
    array('label' => 'Nuevo Periodo', 'url' => array('create')),
);

/* Yii::app()->clientScript->registerScript('search', "
  $('.search-button').click(function(){
  $('.search-form').toggle();
  return false;
  });
  $('.search-form form').submit(function(){
  $('#proceso-grid').yiiGridView('update', {
  data: $(this).serialize()
  });
  return false;
  });
  "); */
?>

<h1>Administrar Periodos</h1>




<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'proceso-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        //'id_proceso',

        'titulo',
        //'fecha_creacion',
        array('name' => 'fecha_inicio',
            'filter' => $this->widget('ext.jui.EJuiDateTimePicker', array(
                'model' => $model,
                'attribute' => 'fecha_inicio',
                'language' => 'es', //default Yii::app()->language
                'mode' => 'datetime', //'datetime' or 'time' ('datetime' default)
                'options' => array(
                    'dateFormat' => 'dd/mm/yy',
                    'timeFormat' => 'hh:mm', //'hh:mm tt' default
                ),
                    )
                    , true),),
        'fecha_fin',
        array('name' => 'estado',
            'filter' => CHtml::listData(Estado::model()->findAll('id_tipo_estado=' . TipoEstado::$PROCESO . ' order by orden ASC'), 'id_estado', 'nombre'),
            'value' => array($this, 'gridNombreEstado')),
        'fecha_fin_proyecto',
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
