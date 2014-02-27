<?php
/* @var $this PlanificacionController */
/* @var $data Planificacion */
?>

<div class="view">

    <b>Título: </b>
    <?php echo CHtml::link($data->titulo, array('view', 'id' => $data->id_planificacion)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('avance')); ?>:</b>
    <?php echo CHtml::encode($data->avance); ?>%
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('fecha_plan')); ?>:</b>
    <?php echo CHtml::encode($data->fecha_plan); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
    <?php echo CHtml::encode($data->estado0->nombre); ?>
    <br />
    <?php /*
    <b><?php echo CHtml::encode('Avances'); ?>: </b>
    <?php echo CHtml::link('Ver lista de avances', array('avance/listaPorPlanificiacion', 'idp' => $data->id_proyecto,'idPlan' => $data->id_planificacion)); ?>
    <br />
    

      <b><?php echo CHtml::encode($data->getAttributeLabel('creador')); ?>:</b>
      <?php echo CHtml::encode($data->creador0->nombre); ?>
      <br />


     * <b><?php echo CHtml::encode($data->getAttributeLabel('id_proyecto')); ?>:</b>
      <?php echo CHtml::encode($data->id_proyecto); ?>
      <br />
     * <b><?php echo CHtml::encode($data->getAttributeLabel('avance')); ?>:</b>
      <?php echo CHtml::encode($data->avance); ?>
      <br />
     * 
      <b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
      <?php echo CHtml::encode($data->descripcion); ?>
      <br />
      <b><?php echo CHtml::encode($data->getAttributeLabel('fecha_plan')); ?>:</b>
      <?php echo CHtml::encode($data->fecha_plan); ?>
      <br />
      <b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
      <?php echo CHtml::encode($data->fecha_creacion); ?>
      <br />
     */ ?>

</div>