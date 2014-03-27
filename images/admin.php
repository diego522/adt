<?php
/* @var $this EvaluacionProyectoGuiaController */
/* @var $model EvaluacionProyectoGuia */

$this->breadcrumbs=array(
	'Evaluacion Proyecto Guias'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List EvaluacionProyectoGuia', 'url'=>array('index')),
	array('label'=>'Create EvaluacionProyectoGuia', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#evaluacion-proyecto-guia-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Evaluacion Proyecto Guias</h1>

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
	'id'=>'evaluacion-proyecto-guia-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_evaluacion_proyecto_guia',
		'id_evaluacion_proyecto_guia_padre',
		'id_proyecto',
		'id_alumno',
		'id_creador',
		'fecha_actualizacion',
		/*
		'desarrollo_cumple_plazo',
		'desarrollo_manifiesta_iniciativa',
		'desarrollo_desarrolla_conocimiento',
		'informe_destaca_importante',
		'informe_expone_claramente',
		'informe_bien_estructurado',
		'informe_adecuada_bibliografia',
		'informe_plantea_opinion',
		'producto_ajusta_requerimiento',
		'producto_interfaz_adecuada',
		'producto_robustez',
		'producto_documentacion_completa',
		'producto_especifica_proceso',
		'comentarios',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
