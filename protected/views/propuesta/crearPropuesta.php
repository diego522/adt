<?php
/* @var $this PropuestaController */
/* @var $model Propuesta */

$this->breadcrumbs = array(
    'Propuestas' => array('index'),
    'Nueva',
);

?>

<h1>Nueva Propuesta de tema</h1>

<?php echo $this->renderPartial('_formCrear', array('model' => $model)); ?>