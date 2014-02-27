<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */
/* @var $evaluacionesProyectoGuia EvaluacionProyectoGuia */
?>
<h1>Calificaciones Proyecto</h1>

<h3>Profesor Guía</h3>
<table>    
    <?php
    foreach ($model->idPropuesta->propuestaInscritas as $prop) {
        ?>
        <tr>
            <td><?php echo $prop->usuario0->username . " " . $prop->usuario0->nombre ?></td>
            <td>
                <?php
                $evaluacionesProyectoGuia = EvaluacionProyectoGuia::model()->findAll('id_alumno=' . $prop->usuario0->id_usuario . ' and id_proyecto=' . $model->id_proyecto . ' and id_evaluacion_proyecto_guia_padre is NULL');
                if ($evaluacionesProyectoGuia) {
                    foreach ($evaluacionesProyectoGuia as $eval) {
                        echo CHtml::link($eval->obtienePromedio(), array('evaluacionProyectoGuia/view', 'id' => $eval->id_evaluacion_proyecto_guia,), array('id' => 'inline')) . "</br>";
                        echo CHtml::link(' Modificar', array('evaluacionProyectoGuia/update', 'id' => $eval->id_evaluacion_proyecto_guia,), array('id' => 'inline'));
                    }
                } else {
                    if (Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR)) || $model->prof_guia == Yii::app()->user->id) {
                        echo CHtml::link('Agregar Evaluación', array('evaluacionProyectoGuia/create', 'ida' => $prop->usuario0->id_usuario, 'idp' => $model->id_proyecto), array('id' => 'inline'));
                    } else {
                        echo 'Sin asignar';
                    }
                }
                ?>
            </td>
        </tr>
    <?php }
    ?>
</table>

<h3>Profesor Informante</h3>
<table>
    <?php
    foreach ($model->idPropuesta->propuestaInscritas as $prop) {
        ?>
        <tr>
            <td><?php echo $prop->usuario0->username . " " . $prop->usuario0->nombre ?></td>
            <td>
                <?php
                $evaluacionesProyectoInformante = EvaluacionProyectoInformante::model()->findAll('id_alumno=' . $prop->usuario0->id_usuario . ' and id_proyecto=' . $model->id_proyecto . ' and id_evaluacion_proyecto_informante_padre is NULL');
                if ($evaluacionesProyectoInformante) {
                    foreach ($evaluacionesProyectoInformante as $eval) {
                        echo CHtml::link($eval->obtienePromedio(), array('evaluacionProyectoInformante/view', 'id' => $eval->id_evaluacion_proyecto_informante,), array('id' => 'inline')) . "</br>";
                        echo CHtml::link(' Modificar', array('evaluacionProyectoInformante/update', 'id' => $eval->id_evaluacion_proyecto_informante,), array('id' => 'inline'));
                    }
                } else {
                    if (Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR)) || $model->prof_informante == Yii::app()->user->id) {
                        echo CHtml::link('Agregar Evaluación', array('evaluacionProyectoInformante/create', 'ida' => $prop->usuario0->id_usuario, 'idp' => $model->id_proyecto), array('id' => 'inline'));
                    } else {
                        echo 'Sin asignar';
                    }
                }
                ?>
            </td>
        </tr>
    <?php }
    ?>
</table>

<h1>Calificaciones Defensa</h1>
<h3>Profesor Guía</h3>
<table>
    <?php
    foreach ($model->idPropuesta->propuestaInscritas as $prop) {
        ?>
        <tr>
            <td><?php echo $prop->usuario0->username . " " . $prop->usuario0->nombre ?></td>
            <td>
                <?php
                $evaluacionesDefensaGuia = EvaluacionDefensaGuia::model()->findAll('id_alumno=' . $prop->usuario0->id_usuario . ' and id_proyecto=' . $model->id_proyecto . ' and id_evaluacion_defensa_guia_padre is NULL');
                if ($evaluacionesDefensaGuia) {
                    foreach ($evaluacionesDefensaGuia as $eval) {
                        echo CHtml::link($eval->obtienePromedio(), array('evaluacionDefensaGuia/view', 'id' => $eval->id_evaluacion_defensa_guia,), array('id' => 'inline')) . "</br>";
                        echo CHtml::link(' Modificar', array('evaluacionDefensaGuia/update', 'id' => $eval->id_evaluacion_defensa_guia,), array('id' => 'inline'));
                    }
                } else {
                    if (Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR)) || $model->prof_guia == Yii::app()->user->id) {
                        echo CHtml::link('Agregar Evaluación', array('evaluacionDefensaGuia/create', 'ida' => $prop->usuario0->id_usuario, 'idp' => $model->id_proyecto), array('id' => 'inline'));
                    } else {
                        echo 'Sin asignar';
                    }
                }
                ?>
            </td>
        </tr>
    <?php }
    ?>
</table>

<h3>Profesor Informante</h3>
<table>
    <?php
    foreach ($model->idPropuesta->propuestaInscritas as $prop) {
        ?>
        <tr>
            <td><?php echo $prop->usuario0->username . " " . $prop->usuario0->nombre ?></td>
            <td>
                <?php
                $evaluacionesDefensaInformante = EvaluacionDefensaInformante::model()->findAll('id_alumno=' . $prop->usuario0->id_usuario . ' and id_proyecto=' . $model->id_proyecto . ' and id_evaluacion_defensa_informante_padre is NULL');
                if ($evaluacionesDefensaInformante) {
                    foreach ($evaluacionesDefensaInformante as $eval) {
                        echo CHtml::link($eval->obtienePromedio(), array('evaluacionDefensaInformante/view', 'id' => $eval->id_evaluacion_defensa_informante,), array('id' => 'inline')) . "</br>";
                        echo CHtml::link(' Modificar', array('evaluacionDefensaInformante/update', 'id' => $eval->id_evaluacion_defensa_informante,), array('id' => 'inline'));
                    }
                } else {
                    if (Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR)) || $model->prof_informante == Yii::app()->user->id) {
                        echo CHtml::link('Agregar Evaluación', array('evaluacionDefensaInformante/create', 'ida' => $prop->usuario0->id_usuario, 'idp' => $model->id_proyecto), array('id' => 'inline'));
                    } else {
                        echo 'Sin asignar';
                    }
                }
                ?>
            </td>
        </tr>
    <?php }
    ?>
</table>

<h3>Profesor Sala</h3>
<table>
    <?php
    foreach ($model->idPropuesta->propuestaInscritas as $prop) {
        ?>
        <tr>
            <td><?php echo $prop->usuario0->username . " " . $prop->usuario0->nombre ?></td>
            <td>
                <?php
                $evaluacionesDefensaSala = EvaluacionDefensaSala::model()->findAll('id_alumno=' . $prop->usuario0->id_usuario . ' and id_proyecto=' . $model->id_proyecto . ' and id_evaluacion_defensa_sala_padre is NULL');
                if ($evaluacionesDefensaSala) {
                    foreach ($evaluacionesDefensaSala as $eval) {
                        echo CHtml::link($eval->obtienePromedio(), array('evaluacionDefensaSala/view', 'id' => $eval->id_evaluacion_defensa_sala,), array('id' => 'inline')) . "</br>";
                        echo CHtml::link(' Modificar', array('evaluacionDefensaSala/update', 'id' => $eval->id_evaluacion_defensa_sala,), array('id' => 'inline'));
                    }
                } else {
                    if (Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR)) || $model->prof_sala == Yii::app()->user->id) {
                        echo CHtml::link('Agregar Evaluación', array('evaluacionDefensaSala/create', 'ida' => $prop->usuario0->id_usuario, 'idp' => $model->id_proyecto), array('id' => 'inline'));
                    } else {
                        echo 'Sin asignar';
                    }
                }
                ?>
            </td>
        </tr>
    <?php }
    ?>
</table>

<?php
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target' => 'a#inline',
    'config' => array(
        'scrolling' => 'no',
        'titleShow' => false,
    ),)
);
?>