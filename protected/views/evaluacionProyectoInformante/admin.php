<?php
/* @var $this EvaluacionProyectoInformanteController */
/* @var $model EvaluacionProyectoInformante */

$this->breadcrumbs=array(
	'Evaluacion Proyecto Informantes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List EvaluacionProyectoInformante', 'url'=>array('index')),
	array('label'=>'Create EvaluacionProyectoInformante', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#evaluacion-proyecto-informante-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Evaluacion Proyecto Informantes</h1>

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
	'id'=>'evaluacion-proyecto-informante-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_evaluacion_proyecto_informante',
		'id_evaluacion_proyecto_informante_padre',
		'id_proyecto',
		'id_alumno',
		'id_creador',
		'fecha_actualizacion',
		/*
		'informe_destaca_importante',
		'informe_expone_claro',
		'informe_bien_estructurado',
		'informe_adecuada_bibliografia',
		'informe_opiniones_propias',
		'informe_aportes_personales',
		'informe_domina_conceptos',
		'informe_domina_tecnicas',
		'informe_cumple_objetivo',
		'producto_ajusta_requerimientos',
		'producto_interfaz_adecuada',
		'producto_robustez',
		'producto_documentacion',
		'producto_especifica_proceso',
		'comentarios',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
