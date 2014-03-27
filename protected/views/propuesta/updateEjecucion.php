<?php
/* @var $this PropuestaController */
/* @var $model Propuesta */

$this->breadcrumbs = array(
    'Propuestas' => array('misPropuestas'),
    substr($model->titulo, 0, 60) . '...' => array('view', 'id' => $model->id_propuesta),
    'Actualizar',
);

$this->menu = array(
    array('label' => 'Mis Propuestas ', 'url' => array('misPropuestas'),'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$PROFESOR, Rol::$ALUMNO, Rol::$ADMINISTRADOR))),
    array('label' => 'Propuestas Disponibles', 'url' => array('index'), 'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$PROFESOR, Rol::$ALUMNO, Rol::$ADMINISTRADOR))),
    array('label' => 'Nueva Propuesta', 'url' => array('create'), 'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$PROFESOR, Rol::$ADMINISTRADOR))),
    array('label' => 'Ver Propuesta', 'url' => array('view', 'id' => $model->id_propuesta), 'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$PROFESOR, Rol::$ALUMNO, Rol::$ADMINISTRADOR))),
    array('label' => 'Renunciar Propuesta', 'url' => '#', 'linkOptions' => array('submit' => array('renuncia', 'id' => $model->id_propuesta), 'confirm' => '¿Seguro que desea renunciar a esta propuesta?'),'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ALUMNO))),
    array('label' => 'Agregar participante', 'url' => array('agregaParticipante', 'id' => $model->id_propuesta,), 'linkOptions' => array('id' => 'inline'),'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ALUMNO))),
);
?>

<h1>Actualizar Propuesta </h1>
<h3><?php echo $model->titulo; ?></h3>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'propuesta-form',
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
    'enableAjaxValidation' => false,
        /* 'clientOptions' => array(
          'validateOnSubmit' => true,) */
        ));
?>

<?php
$this->widget('CTabView', array(
    'tabs' => array(
        'tab1' => array(
            'title' => 'Detalles',
            'view' => 'formActualiza/_tab1ActualizaProp',
            'data' => array('model' => $model, 'form' => $form),
        ),
        'tab2' => array(
            'title' => 'Objetivos',
            'view' => 'formActualiza/_tab2ActualizaProp',
            'data' => array('model' => $model, 'form' => $form),
        ),
        'tab3' => array(
            'title' => 'Justificación y Desarrollo',
            'view' => 'formActualiza/_tab3ActualizaProp',
            'data' => array('model' => $model, 'form' => $form),
        ),
        'tab4' => array(
            'title' => 'Trabajos Similares',
            'view' => 'formActualiza/_tab4ActualizaProp',
            'data' => array('model' => $model, 'form' => $form),
        ),
        'tab5' => array(
            'title' => 'Adjunto',
            'view' => 'formActualiza/_tab5ActualizaProp',
            'data' => array('model' => $model, 'form' => $form),
        ),
    ),
));
?>
<?php $this->endWidget(); ?>
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