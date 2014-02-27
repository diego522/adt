<?php
/* @var $this AvanceController */
/* @var $data Avance */
?>

<div class="view">
    <b>Título: </b>
    <?php echo CHtml::link($data->titulo, array('view', 'id' => $data->id_avance)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
    <?php echo CHtml::encode($data->fecha_creacion); ?>
    <br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('creador')); ?>:</b>
    <?php echo CHtml::encode($data->creador0->nombre); ?>
    <br />
    <?php /*

      <b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
      <?php echo CHtml::encode($data->descripcion); ?>
      <br />



      <b><?php echo CHtml::encode($data->getAttributeLabel('ruta_adjunto')); ?>:</b>
      <?php echo CHtml::encode($data->ruta_adjunto); ?>
      <br />
     */ ?>



</div>