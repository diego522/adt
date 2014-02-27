<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */
?>
<h3>Registro de fechas</h3>
<br/>
<h4>Etapa de propuesta</h4>
<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        array('label' => 'Fecha de creación', 'value' => $model->idPropuesta->fecha_creacion . ' (' . $model->idPropuesta->usuarioCreador->nombre . ')'),
        array('label' => 'Fecha de envío a revisión', 'value' => $model->idPropuesta->fecha_presenta_propuesta),
        array('label' => 'Fecha de resolución', 'value' => $model->idPropuesta->fecha_resolucion . ' (' . $model->idPropuesta->estado0->nombre . ')'),
    ),
));
?>

<br/>
<h4>Etapa de profesor guía</h4>
<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'fecha_inicio',
        'fecha_fin',
        'fecha_guia_notif_jefe_carr',
    ),
));
?>
<br/>
<h4>Etapa de profesor informante</h4>
<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'fecha_asigna_informante',
        'fecha_entrega_a_informante',
        'fecha_max_rev_informante',
        // 'fecha_defensa',
        'fecha_real_entrega_rev_informante',
    ),
));
?>
<br/>
<h4>Etapa de defensa</h4>
<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'fecha_entrega_cd',
        'fecha_entrega_empaste',
        'fecha_defensa',
    ),
));
?>