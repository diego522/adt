<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */

$this->breadcrumbs = array(
    'Mis Proyectos' => array('index'),
    'Detalles',
);

$this->menu = array(
    array('label' => 'Planificación', 'url' => array('planificacion/lista', 'idp' => $model->id_proyecto), 'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$PROFESOR, Rol::$ALUMNO, Rol::$ADMINISTRADOR))),
    array('label' => 'Actualizar Proyecto', 'url' => array('update', 'id' => $model->id_proyecto), 'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR))),
    array('label' => 'Solicitudes de aplazamiento', 'url' => array('solicitud/viewSolicitudes', 'id' => $model->id_proyecto), 'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ALUMNO, Rol::$PROFESOR, Rol::$ADMINISTRADOR))),
    array('label' => 'Notificar Finalización del proyecto (Profesor Guía)', 'url' => array('notificaGuia', 'id' => $model->id_proyecto), 'linkOptions' => array('id' => 'inline'), 'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$PROFESOR, Rol::$ADMINISTRADOR))),
    array('label' => 'Asignar Profesor Infomante', 'url' => array('asignaProfeInformante', 'idp' => $model->id_proyecto)/*, 'linkOptions' => array('id' => 'inline')*/, 'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR))),
    array('label' => 'Informante retira informe de proyecto', 'url' => array('InformanteRetiraProyecto', 'id' => $model->id_proyecto), 'linkOptions' => array('id' => 'inline'), 'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR))),
    array('label' => 'Notificar Finalización de revisión (Profesor informante)', 'url' => array('notificaInformante', 'id' => $model->id_proyecto), 'linkOptions' => array('id' => 'inline'), 'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$PROFESOR, Rol::$ADMINISTRADOR))),
    array('label' => 'Notifica entrega de empaste y disco', 'url' => array('notificaEntregaDeEmpasteYDisco', 'id' => $model->id_proyecto), 'linkOptions' => array('id' => 'inline'), 'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR))),
    array('label' => 'Planificar Defensa', 'url' => array('defensa/create', 'idp' => $model->id_proyecto), 'linkOptions' => array('id' => 'inline'), 'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR))),
    array('label' => 'Finalización de Proyecto',  'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR)), ),
    array('label' => 'Aprobar proyecto', 'url' => '#','linkOptions'=>array('submit'=>array('cierraProyecto', 'id' => $model->id_proyecto),'confirm'=>'Seguro desea finalizar y Aprobar este proyecto?'), 'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR)),),
    array('label' => 'Reprobar proyecto', 'url' => array('repruebaProyecto', 'id' => $model->id_proyecto), 'linkOptions' => array('id' => 'inline'), 'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$PROFESOR, Rol::$ADMINISTRADOR))),
);
?>

<h1>Detalles del proyecto</h1>
<h3> <?php echo $model->idPropuesta->titulo; ?></h3>
<?php
$this->widget('CTabView', array(
    'tabs' => array(
        'tab1' => array(
            'title' => 'Detalles',
            'view' => 'viewTab/viewTab1',
            'data' => array('model' => $model, 'tabla' => $tabla),
        ),
        'tab2' => array(
            'title' => 'Profesores responsables',
            'view' => 'viewTab/viewTab2',
            'data' => array('model' => $model,),
        ),
        'tab3' => array(
            'title' => 'Fechas',
            'view' => 'viewTab/viewTab5',
            'data' => array('model' => $model,),
        ),
        'tab4' => array(
            'title' => 'Calificaciones',
            'view' => 'viewTab/viewTab3',
            'data' => array('model' => $model,),
        ),
        'tab5' => array(
            'title' => 'Carta de Compromiso',
            'view' => 'viewTab/viewTab6',
            'data' => array('model' => $model, 'encargado' => $encargado),
        ),
        'tab6' => array(
            'title' => 'Defensa',
            'view' => 'viewTab/viewTab7',
            'data' => array('model' => $model,),
        ),
        'tab8' => array(
            'title' => 'Carta de Aceptación',
            'view' => 'viewTab/viewTab8',
            'data' => array('model' => $model,),
        ),
        'tab7' => array(
            'title' => 'Historial',
            'view' => 'viewTab/viewTab4',
            //'visible' => Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR)),
            'data' => array('model' => $model,'tablaCambios'=>$tablaCambios),
        ),
        
    ),
));
?>
<?php
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target' => 'a#inline',
    'config' => array(
        'scrolling' => 'no',
        'titleShow' => false,
    // 'onComplete' => 'function(){tinyMCE_setup();}',
    ),
        )
);
?>

