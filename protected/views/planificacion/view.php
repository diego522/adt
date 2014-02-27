<?php
/* @var $this PlanificacionController */
/* @var $model Planificacion */

$this->breadcrumbs = array(
    'Proyecto' => array('proyecto/view', 'id' => $model->id_proyecto),
    'Planificación' => array('lista', 'idp' => $model->id_proyecto),
    'Detalle',
);

$this->menu = array(
    array('label' => 'Lista de hitos', 'url' => array('lista', 'idp' => $model->id_proyecto), 'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$PROFESOR, Rol::$ALUMNO, Rol::$ADMINISTRADOR))),
    array('label' => 'Nuevo hito', 'url' => array('create', 'idp' => $model->id_proyecto), 'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$PROFESOR, Rol::$ALUMNO, Rol::$ADMINISTRADOR))),
    array('label' => 'Modificar hito', 'url' => array('update', 'id' => $model->id_planificacion), 'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$PROFESOR, Rol::$ALUMNO, Rol::$ADMINISTRADOR))),
    array('label' => 'Hito Cumplido', 'url' => array('hitoCumplido', 'id' => $model->id_planificacion), 'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$PROFESOR, Rol::$ADMINISTRADOR))),
    array('label' => 'Eliminar hito', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id_planificacion), 'confirm' => 'Seguro que desea eliminar este hito?'), 'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$PROFESOR, Rol::$ALUMNO, Rol::$ADMINISTRADOR))),
);
?>

<h1>Detalle del hito <?php echo $model->titulo ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        /* array('name' => 'id_planificacion',
          'visible' => $model->id_planificacion ? true : false), */
        /* 'titulo', */
        /* 'id_proyecto', */
        'fecha_plan',
        'fecha_hito_cumplido',
        array('name' => 'creador',
            'value' => $model->creador0->nombre),
        array('name' => 'estado',
            'value' => $model->estado0->nombre),
        array('name' => 'avance',
            'value' => $model->avance . "%"),
        array('name' => 'descripcion',
            'type' => 'raw'),
        'fecha_creacion',
    ),
));

//array('label' => 'Agregar participante', 'url' => array('agregaParticipante', 'id' => $model->id_propuesta,), 'linkOptions' => array('id' => 'inline'))
?>

<h3>Lista de avances del hito</h3>
<?php echo CHtml::link('Nuevo Avance', array('avance/createDesdePlanificacion', 'idp' => $model->id_proyecto, 'idPlan' => $model->id_planificacion), array('id' => 'inline')); ?>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'avance-grid',
    'dataProvider' => $modelAvance->search($model->id_planificacion),
    'filter' => $modelAvance,
    'columns' => array(
        /* 'id_avance',
          'id_planificacion',
          'id_proyecto', */
        array('name' => 'titulo',
            'filter' => false),
        //'descripcion',
        array('name' => 'fecha_creacion',
            'filter' => false),
        array('header' => 'Corrección',
            'filter' => false,
            'type' => 'raw',
            'value' => array($this, 'gridCorreccion')),
        //'ruta_adjunto',
        /*
          'creador',
         */
        array(
            'class' => 'CButtonColumn',
            'template' => '{view} {update} {delete}',
            'buttons' => array(
                'view' => array(
                    //'label' => 'Ver detalles',
                    'url' => "CHtml::normalizeUrl(array('avance/view', 'id'=>\$data->id_avance))",
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/ver_icon.png',
                    'options' => array('id' => 'inline')
                // 'options' => array('class'=>'pdf'),
                ),
                'update' => array(
                    //'label' => 'Ver detalles',
                    'url' => "CHtml::normalizeUrl(array('avance/update', 'id'=>\$data->id_avance))",
                    'title' => "Modificar",
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/edit_icon.png',
                    'options' => array('id' => 'inline')
                // 'options' => array('class'=>'pdf'),
                ),
                'delete' => array(
                    //'label' => 'Ver detalles',
                    'url' => "CHtml::normalizeUrl(array('avance/delete', 'id'=>\$data->id_avance))",
                    'title' => "Eliminar",
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/delete_icon.png',
                // 'options' => array('id' => 'inline')
                // 'options' => array('class'=>'pdf'),
                ),
            ),
        ),
    ),
));
?>
<?php
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target' => 'a#inline',
    'config' => array(
        'scrolling' => 'no',
        'titleShow' => false,
    ),
        )
);
?>