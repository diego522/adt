<?php
/* @var $this PlanificacionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Proyecto' => array('proyecto/view', 'id' => $idp),
    'Planificación',
);

$this->menu = array(
    array('label' => 'Nuevo hito', 'url' => array('create', 'idp' => $idp), 'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$PROFESOR, Rol::$ALUMNO, Rol::$ADMINISTRADOR))),
);
?>

<h1>Planificación de mi proyecto </h1>
<h3><?php echo $titulo; ?></h3>


<div class="view" style="width:300px;" >
    <h4>Avance del proyecto</h4>    <table align="center">
        <tr>
            <td align="right" nowrap="nowrap"><b>Planificado</b></td>
            <td align="left"><div class="barraavance" style="width:<?php echo Planificacion::porcentajePlanificado($idp) ?>px;"></div> <?php echo Planificacion::porcentajePlanificado($idp) ?>%</td>
        </tr>
        <tr>
            <td align="right" nowrap="nowrap"><b>Completado</b></td>
            <td align="left"><div class="barraavance" style="width:<?php echo Planificacion::porcentajeDeAvance($idp) ?>px;"></div><?php echo Planificacion::porcentajeDeAvance($idp) ?>% </td>
        </tr>
        <tr>
            <td align="right" nowrap="nowrap"><b>Pendiente</b></td>
            <td align="left">
                <div class="barraavance" style="width:<?php echo (Planificacion::porcentajePlanificado($idp) - Planificacion::porcentajeDeAvance($idp)) ?>px;"></div>
                <?php echo (Planificacion::porcentajePlanificado($idp) - Planificacion::porcentajeDeAvance($idp)) ?>% </td>
        </tr>
    </table>
</div>

<h4>&nbsp;</h4>
<h4>Lista de hitos</h4>


<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'planificacion-grid',
    'dataProvider' => $model->search($idp),
    'filter' => $model,
    'columns' => array(
        //'id_planificacion',
        array('name' => 'titulo',
            'value' => array($this, 'gridTituloHito'),
            'type' => 'raw',
            'filter' => false),
        array('name' => 'fecha_plan',
            'filter' => false),
        //'id_proyecto',
        array('name' => 'estado',
            'value' => array($this, 'gridEstadoHito'),
            'filter' => false,
            'filter' => CHtml::listData(Estado::model()->findAll('id_tipo_estado=' . TipoEstado::$PLANIFICACION), 'id_estado', 'nombre')
        ),
        array('name' => 'avance',
            'value' => array($this, 'gridProgreso'),
            'filter' => false),
        //'descripcion',
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


<?php
/* $this->widget('zii.widgets.CListView', array(
  'dataProvider' => $dataProvider,
  'itemView' => '_view',
  )); */
?>
