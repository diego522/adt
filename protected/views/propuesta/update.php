<?php
/* @var $this PropuestaController */
/* @var $model Propuesta */

$this->breadcrumbs = array(
    'Propuestas' => array('index'),
    $model->titulo => array('view', 'id' => $model->id_propuesta),
    'Actualizar',
);

?>
<h1>Actualizar Propuesta de Tema <i><?php echo $model->titulo; ?></i></h1>

<?php echo $this->renderPartial('_formCrear', array('model' => $model)); ?>