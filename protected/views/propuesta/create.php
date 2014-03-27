<?php
/* @var $this PropuestaController */
/* @var $model Propuesta */

$this->breadcrumbs = array(
    'Propuestas' => array('index'),
    'Nueva',
);

?>

<h1>Nueva Propuesta de Tema</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>