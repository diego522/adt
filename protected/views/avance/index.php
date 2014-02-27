<?php
/* @var $this AvanceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Proyecto'=>array('proyecto/view','id'=>$idp),
        'Planificación'=>array('planificacion/lista','idp'=>$idp),
        'Hito'=>array('planificacion/view','id'=>$idPlan),
	'Lista de Avances',
);

$this->menu=array(
	array('label'=>'Nuevo Avance', 'url'=>array('createDesdePlanificacion','idp'=>$idp,'idPlan'=>$idPlan)),
	/*array('label'=>'Manage Avance', 'url'=>array('admin')),*/
);
?>

<h1>Lista de Avances</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
