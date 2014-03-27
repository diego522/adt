<?php
/* @var $this TipoSolicitudController */
/* @var $model TipoSolicitud */

$this->breadcrumbs=array(
	'Tipo Solicituds'=>array('index'),
	$model->id_tipo_solicitud=>array('view','id'=>$model->id_tipo_solicitud),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoSolicitud', 'url'=>array('index')),
	array('label'=>'Create TipoSolicitud', 'url'=>array('create')),
	array('label'=>'View TipoSolicitud', 'url'=>array('view', 'id'=>$model->id_tipo_solicitud)),
	array('label'=>'Manage TipoSolicitud', 'url'=>array('admin')),
);
?>

<h1>Update TipoSolicitud <?php echo $model->id_tipo_solicitud; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>