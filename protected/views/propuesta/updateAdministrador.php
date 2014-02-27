<?php
/* @var $this PropuestaController */
/* @var $model Propuesta */

$this->breadcrumbs = array(
    'Propuestas' => array('misPropuestas'),
    $model->titulo => array('view', 'id' => $model->id_propuesta),
    'Actualizar',
);

?>
<?php
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target' => 'a#inline',
    'config' => array(
        'scrolling' => 'no',
        'titleShow' => true,
    ),
        )
);
?>
<h1>Actualizar Propuesta </h1>

<?php echo $this->renderPartial('_actualizaAdministrador', array('model' => $model)); ?>

