<?php
/* @var $this CorreccionController */
/* @var $model Correccion */

$this->breadcrumbs = array(
    'Correccions' => array('index'),
    'Manage',
);

?>


<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'correccion-grid',
    'dataProvider' => $model->search(),
    'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css'),
    'filter' => $model,
    'columns' => array(
        'id_correccion',
        'id_avance',
        'id_proyecto',
        'fecha_creacion',
        'creador',
        'descripcion',
        /*
          'adjunto',
         */
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
