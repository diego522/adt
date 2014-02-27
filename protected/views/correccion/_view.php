<?php
/* @var $this CorreccionController */
/* @var $data Correccion */
?>

<div class="view">

    <b>Título: </b>
    <?php echo CHtml::link($data->titulo, array('view', 'id' => $data->id_correccion)); ?>
    <br />

    <?php /*
      <b><?php echo CHtml::encode($data->getAttributeLabel('id_avance')); ?>:</b>
      <?php echo CHtml::encode($data->id_avance); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('id_proyecto')); ?>:</b>
      <?php echo CHtml::encode($data->id_proyecto); ?>
      <br />
     */ ?>
    <b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
    <?php echo CHtml::encode($data->fecha_creacion); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('creador')); ?>:</b>
    <?php echo CHtml::encode($data->creador0->nombre); ?>
    <br />
    <?php /*
      <b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
      <?php echo $data->descripcion; ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('adjunto')); ?>:</b>
      <?php echo CHtml::encode($data->adjunto); ?>
      <br />

     */ ?>
</div>