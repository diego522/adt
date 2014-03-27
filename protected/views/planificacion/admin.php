<?php

/* @var $this PlanificacionController */
/* @var $model Planificacion */

$this->breadcrumbs = array(
    'Planificacions' => array('index'),
    'Manage',
);
?>


<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'planificacion-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id_planificacion',
        'fecha_creacion',
        'id_proyecto',
        'estado',
        'avance',
        'descripcion',
        /*
          'creador',
          'fecha_plan',
         */
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
