<?php
/* @var $this PropuestaController */
/* @var $model Propuesta */

$this->breadcrumbs = array(
    'Propuestas de Tema' => array('misPropuestas'),
    $model->titulo,
);
$this->menu = array(
    array('label' => 'Completar Propuesta', 'url' => array('update', 'id' => $model->id_propuesta), 'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$PROFESOR, Rol::$ALUMNO, Rol::$ADMINISTRADOR))),
    array('label' => 'Enviar a revisión', 'url' => '#', 'linkOptions' => array('submit' => array('enviaARevision', 'id' => $model->id_propuesta), 'confirm' => '¿Seguro que desea enviar la propuesta a revisión?, después ya no podrá editarla'), 'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ALUMNO,))),
    array('label' => 'Agregar participante', 'url' => array('agregaParticipante', 'id' => $model->id_propuesta,), 'linkOptions' => array('id' => 'inline'), 'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ALUMNO,))),
    array('label' => 'Modifica como administrador', 'url' => array('modificacionAdministrador', 'id' => $model->id_propuesta), 'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR))),
    array('label' => 'Resolver situación', 'url' => array('resolverSituacion', 'id' => $model->id_propuesta), 'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR))),
);
?>

<h1>Detalle de la Propuesta de Tema</h1>


<div class="iconosdescarga">
<?php echo CHtml::link( '<img align="middle" title="Descarga esta propuesta en PDF" src="' . Yii::app()->request->baseUrl . '/images/pdf_icon.png"/>'.' Descargar Propuesta', array('verPDF', 'id' => $model->id_propuesta,)); ?>
</div>

<div style="margin-top:70px; display:table;">
<?php
$this->widget('CTabView', array(
    'tabs' => array(
        'tab1' => array(
            'title' => 'Detalles',
            'view' => 'viewEjecucion/_tab1ViewEjecucion',
            'data' => array('model' => $model, 'tabla' => $tabla),
        ),
        'tab2' => array(
            'title' => 'Contacto',
            'view' => 'viewEjecucion/_tab2ViewEjecucion',
            'data' => array('model' => $model,),
        ),
        'tab3' => array(
            'title' => 'Objetivos',
            'view' => 'viewEjecucion/_tab3ViewEjecucion',
            'data' => array('model' => $model,),
        ),
        'tab4' => array(
            'title' => 'Justificación y Desarrollo',
            'view' => 'viewEjecucion/_tab4ViewEjecucion',
            'data' => array('model' => $model,),
        ),
        'tab5' => array(
            'title' => 'Trabajos similares',
            'view' => 'viewEjecucion/_tab5ViewEjecucion',
            'data' => array('model' => $model,),
        ),
        'tab6' => array(
            'title' => 'Adjunto',
            'view' => 'viewEjecucion/_tab6ViewEjecucion',
            'data' => array('model' => $model,),
        ),
        'tab7' => array(
            'title' => 'Observaciones',
            'view' => 'viewEjecucion/_tab7ViewEjecucion',
            'data' => array('model' => $model,),
        ),
        'tab8' => array(
            'title' => 'Historial',
            'view' => 'viewEjecucion/_tab8ViewEjecucion',
            'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR)),
            'data' => array('tablaCambios' => $tablaCambios,),
        ),
    ),
));
?>
</div>
<?php
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target' => 'a#inline',
    'config' => array(
        'scrolling' => 'no',
        'titleShow' => true,
    ),
        )
);