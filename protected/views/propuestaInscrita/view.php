<?php
/* @var $this PropuestaInscritaController */
/* @var $model PropuestaInscrita */

$this->breadcrumbs=array(
	'Propuesta Inscritas'=>array('index'),
	$model->id_propuesta_inscrita,
);

$this->menu=array(
	array('label'=>'List PropuestaInscrita', 'url'=>array('index')),
	array('label'=>'Create PropuestaInscrita', 'url'=>array('create')),
	array('label'=>'Update PropuestaInscrita', 'url'=>array('update', 'id'=>$model->id_propuesta_inscrita)),
	array('label'=>'Delete PropuestaInscrita', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_propuesta_inscrita),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PropuestaInscrita', 'url'=>array('admin')),
);
?>

<h1>View PropuestaInscrita #<?php echo $model->id_propuesta_inscrita; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_propuesta_inscrita',
		'id_propuesta',
		'usuario',
		'fecha_creacion',
	),
)); ?>
