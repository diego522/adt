<?php
/* @var $this PropuestaController */
/* @var $data Propuesta */
?>

<div class="view">
    <div class="titulodetalle">
        <b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->titulo),array('view', 'id' => $data->id_propuesta)); ?>
        <br />

    </div>
    <div class="cajadetalle">
        

        <b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
        <?php echo CHtml::encode($data->estado0->nombre); ?>
        <br />
    </div>



    <?php /* <b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
      <?php echo CHtml::encode($data->descripcion); ?>
      <br /> 
     * <b><?php echo CHtml::encode('Detalles'); ?>:</b>
        <?php echo CHtml::link('Ver', array('view', 'id' => $data->id_propuesta)); ?>
        <br />
     */ ?>

    <b><?php echo CHtml::encode($data->getAttributeLabel('usuario_creador')); ?>:</b>
    <?php echo CHtml::encode($data->usuarioCreador->nombre . ' ' . $data->usuarioCreador->apellido); ?>
    <br />

    <?php /*
      <b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
      <?php echo CHtml::encode($data->fecha_creacion); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('fecha_resolucion')); ?>:</b>
      <?php echo CHtml::encode($data->fecha_resolucion); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('fecha_resolucion_presentacion')); ?>:</b>
      <?php echo CHtml::encode($data->fecha_resolucion_presentacion); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('fecha_presentacion')); ?>:</b>
      <?php echo CHtml::encode($data->fecha_presentacion); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('fecha_presenta_propuesta')); ?>:</b>
      <?php echo CHtml::encode($data->fecha_presenta_propuesta); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('id_proceso')); ?>:</b>
      <?php echo CHtml::encode($data->id_proceso); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('observaciones')); ?>:</b>
      <?php echo CHtml::encode($data->observaciones); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('objetivos')); ?>:</b>
      <?php echo CHtml::encode($data->objetivos); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('plan_trabajo')); ?>:</b>
      <?php echo CHtml::encode($data->plan_trabajo); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('justificacion')); ?>:</b>
      <?php echo CHtml::encode($data->justificacion); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('adjunto')); ?>:</b>
      <?php echo CHtml::encode($data->adjunto); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('metodologia')); ?>:</b>
      <?php echo CHtml::encode($data->metodologia); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('trabajos_simi')); ?>:</b>
      <?php echo CHtml::encode($data->trabajos_simi); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('bibliografia')); ?>:</b>
      <?php echo CHtml::encode($data->bibliografia); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('nombre_empresa')); ?>:</b>
      <?php echo CHtml::encode($data->nombre_empresa); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('nombre_responsable')); ?>:</b>
      <?php echo CHtml::encode($data->nombre_responsable); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('cargo_responsable')); ?>:</b>
      <?php echo CHtml::encode($data->cargo_responsable); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('cant_participantes')); ?>:</b>
      <?php echo CHtml::encode($data->cant_participantes); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('comentarios')); ?>:</b>
      <?php echo CHtml::encode($data->comentarios); ?>
      <br />

     */ ?>

</div>