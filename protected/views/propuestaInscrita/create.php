<?php
/* @var $this PropuestaInscritaController */
/* @var $model PropuestaInscrita */

$this->breadcrumbs=array(
	'Propuesta Inscritas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PropuestaInscrita', 'url'=>array('index')),
	array('label'=>'Manage PropuestaInscrita', 'url'=>array('admin')),
);
?>

<h1>Create PropuestaInscrita</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>