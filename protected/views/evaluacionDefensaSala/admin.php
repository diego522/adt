<?php
/* @var $this EvaluacionDefensaSalaController */
/* @var $model EvaluacionDefensaSala */

$this->breadcrumbs=array(
	'Evaluacion Defensa Salas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List EvaluacionDefensaSala', 'url'=>array('index')),
	array('label'=>'Create EvaluacionDefensaSala', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#evaluacion-defensa-sala-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Evaluacion Defensa Salas</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'evaluacion-defensa-sala-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_evaluacion_defensa_sala',
		'id_evaluacion_defensa_sala_padre',
		'id_alumno',
		'id_proyecto',
		'id_creador',
		'fecha_actualizacion',
		/*
		'general_formal',
		'general_seguridad',
		'general_uso_medios',
		'general_planifica_presentacion',
		'general_material_visual',
		'especifico_claridad',
		'especifico_destaca_aspectos',
		'especifico_conclusiones',
		'especifico_respuestas',
		'especifico_desempeño',
		'comentarios',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
