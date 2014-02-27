<?php
/* @var $this ProyectoController */
/* @var $data Proyecto */
?>

<div class="view">

    <b><?php echo CHtml::encode('Proyecto'); ?>: </b>
    <?php echo CHtml::link($data->idPropuesta->titulo, array('view', 'id' => $data->id_proyecto)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('estado_actual')); ?>: </b>
    <?php echo CHtml::encode($data->estadoActual->nombre); ?>
    <br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('estado_avance')); ?>: </b>
    <?php echo CHtml::encode($data->estadoAvance->nombre); ?>
    <br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('fecha_inicio')); ?>: </b>
    <?php echo CHtml::encode($data->fecha_inicio); ?>
    <br />
    <?php /*
      <b><?php echo CHtml::encode($data->getAttributeLabel('fecha_fin')); ?>: </b>
      <?php echo CHtml::encode($data->fecha_fin); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('prof_guia')); ?>: </b>
      <?php echo CHtml::encode($data->profGuia?$data->profGuia->nombre:''); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('prof_informante')); ?>: </b>
      <?php echo CHtml::encode($data->profInformante?$data->profInformante->nombre:''); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('prof_sala')); ?>: </b>
      <?php echo CHtml::encode($data->profSala?$data->profSala->nombre:''); ?>
      <br />
     */
    ?>

    <?php /*
     * 
     * <b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
      <?php echo CHtml::encode($data->fecha_creacion); ?>
      <br />
      <b><?php echo CHtml::encode($data->getAttributeLabel('id_propuesta')); ?>:</b>
      <?php echo CHtml::encode($data->id_propuesta); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('fecha_inicio')); ?>:</b>
      <?php echo CHtml::encode($data->fecha_inicio); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('calif_defensa_guia')); ?>:</b>
      <?php echo CHtml::encode($data->calif_defensa_guia); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('calif_defensa_info')); ?>:</b>
      <?php echo CHtml::encode($data->calif_defensa_info); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('calif_defensa_sala')); ?>:</b>
      <?php echo CHtml::encode($data->calif_defensa_sala); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('calif_guia')); ?>:</b>
      <?php echo CHtml::encode($data->calif_guia); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('calif_informante')); ?>:</b>
      <?php echo CHtml::encode($data->calif_informante); ?>
      <br />

     */ ?>

</div>