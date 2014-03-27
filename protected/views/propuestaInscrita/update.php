<?php
/* @var $this PropuestaInscritaController */
/* @var $model PropuestaInscrita */

$this->breadcrumbs=array(
	'Propuesta Inscritas'=>array('index'),
	$model->id_propuesta_inscrita=>array('view','id'=>$model->id_propuesta_inscrita),
	'Update',
);

$this->menu=array(
	array('label'=>'List PropuestaInscrita', 'url'=>array('index')),
	array('label'=>'Create PropuestaInscrita', 'url'=>array('create')),
	array('label'=>'View PropuestaInscrita', 'url'=>array('view', 'id'=>$model->id_propuesta_inscrita)),
	array('label'=>'Manage PropuestaInscrita', 'url'=>array('admin')),
);
?>

<h1>Update PropuestaInscrita <?php echo $model->id_propuesta_inscrita; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>