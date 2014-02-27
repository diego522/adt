<?php
/* @var $this PropuestaInscritaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Propuesta Inscritas',
);

$this->menu=array(
	array('label'=>'Create PropuestaInscrita', 'url'=>array('create')),
	array('label'=>'Manage PropuestaInscrita', 'url'=>array('admin')),
);
?>

<h1>Propuesta Inscritas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
