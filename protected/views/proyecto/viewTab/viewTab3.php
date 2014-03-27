<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */
/* @var $evaluacionesProyectoGuia EvaluacionProyectoGuia */
?>

<style>
    .recuadro{
        border-radius: 8px;
        margin-bottom: 8px;
        background-color: #F1F1F1;
        padding: 4px 13px;

    }
</style>
<h1>Calificaciones del proyecto</h1>
<div class="recuadro">

    <h2>Etapa de desarrollo</h2>

    <b>Profesor Guía:</b> <?php echo $model->profGuia ? $model->profGuia->nombre : ''; ?>
    <table style="border-bottom:1px solid #FFF;">    
        <?php
        foreach ($model->idPropuesta->propuestaInscritas as $prop) {
            ?>
            <tr>
                <td>&nbsp;<?php echo $prop->usuario0->username . " " . $prop->usuario0->nombre ?>&nbsp;</td>
                <?php
                $evalProyectoGuia = EvaluacionProyectoGuia::model()->find('id_alumno=' . $prop->usuario0->id_usuario . ' and id_proyecto=' . $model->id_proyecto . ' and id_evaluacion_proyecto_guia_padre is NULL');
                if ($evalProyectoGuia) {
                    echo "<td>" . CHtml::link($evalProyectoGuia->obtienePromedio(), array('evaluacionProyectoGuia/view', 'id' => $evalProyectoGuia->id_evaluacion_proyecto_guia,), array('id' => 'inline')) . "</td>";
                    if (Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR)) || ($model->prof_guia == Yii::app()->user->id && $evalProyectoGuia->estado == Estado::$EVALUACION_PENDIENTE_DE_ENVIO)) {
                        echo "<td>" . CHtml::link($evalProyectoGuia->estado == Estado::$EVALUACION_PENDIENTE_DE_ENVIO?' Modificar ('.'Sin enviar)':' Modificar ('.'Enviada'.')', array('evaluacionProyectoGuia/update', 'id' => $evalProyectoGuia->id_evaluacion_proyecto_guia,), array('id' => 'inline')) . "</td>";
                    }
                    echo "<td>" . CHtml::link('<img align="middle" title="Descarga esta vista en PDF" src="' . Yii::app()->request->baseUrl . '/images/pdf_icon.png"/>', array('evaluacionProyectoGuia/VerPDF', 'id' => $evalProyectoGuia->id_evaluacion_proyecto_guia)) . " </td>";
                    //echo "<td>" . $evalProyectoGuia->evaluacionCompleta() ? 'SI' : 'NO' . "</td>";
                } else {
                    if (Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR)) || $model->prof_guia == Yii::app()->user->id) {
                        echo "<td>" . CHtml::link('Agregar Evaluación', array('evaluacionProyectoGuia/create', 'ida' => $prop->usuario0->id_usuario, 'idp' => $model->id_proyecto), array('id' => 'inline')) . "</td>";
                    } else {
                        echo ' ';
                    }
                }
                ?>
            </tr>
        <?php }
        ?>
    </table>

    <b>Profesor Informante:</b> <?php echo $model->profInformante ? $model->profInformante->nombre : ''; ?>
    <table style="border-bottom:1px solid #FFF;">    
        <?php
        foreach ($model->idPropuesta->propuestaInscritas as $prop) {
            ?>
            <tr>
                <td><?php echo $prop->usuario0->username . " " . $prop->usuario0->nombre ?></td>

                <?php
                $evaluacionesProyectoInformante = EvaluacionProyectoInformante::model()->find('id_alumno=' . $prop->usuario0->id_usuario . ' and id_proyecto=' . $model->id_proyecto . ' and id_evaluacion_proyecto_informante_padre is NULL');
                if ($evaluacionesProyectoInformante) {
                    echo "<td>" . CHtml::link($evaluacionesProyectoInformante->obtienePromedio(), array('evaluacionProyectoInformante/view', 'id' => $evaluacionesProyectoInformante->id_evaluacion_proyecto_informante,), array('id' => 'inline')) . "</td>";
                    if (Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR)) || ($model->prof_informante == Yii::app()->user->id && $evaluacionesProyectoInformante->estado == Estado::$EVALUACION_PENDIENTE_DE_ENVIO)) {
                        echo "<td>" . CHtml::link($evaluacionesProyectoInformante->estado == Estado::$EVALUACION_PENDIENTE_DE_ENVIO?' Modificar ('.'Sin enviar)':' Modificar ('.'Enviada'.')', array('evaluacionProyectoInformante/update', 'id' => $evaluacionesProyectoInformante->id_evaluacion_proyecto_informante,), array('id' => 'inline')) . "</td>";
                    }
                    echo "<td>" . CHtml::link('<img align="middle" title="Descarga esta vista en PDF" src="' . Yii::app()->request->baseUrl . '/images/pdf_icon.png"/>', array('evaluacionProyectoInformante/VerPDF', 'id' => $evaluacionesProyectoInformante->id_evaluacion_proyecto_informante)) . "</td>";
                    //  echo "<td>Eval. Completa " . $evaluacionesProyectoInformante->evaluacionCompleta() ? 'SI' : 'NO' . "</td>";
                } else {
                    if (Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR)) || $model->prof_informante == Yii::app()->user->id) {
                        echo "<td>" . CHtml::link('Agregar Evaluación', array('evaluacionProyectoInformante/create', 'ida' => $prop->usuario0->id_usuario, 'idp' => $model->id_proyecto), array('id' => 'inline')) . "</td>";
                    } else {
                        echo ' ';
                    }
                }
                ?>

            </tr>
        <?php }
        ?>
    </table>
</div>

<div class="recuadro">
    <h2>Etapa de la defensa</h2>
    <b>Profesor Guía:</b> <?php echo $model->profGuia ? $model->profGuia->nombre : ''; ?>
    <table style="border-bottom:1px solid #FFF;">    
        <?php
        foreach ($model->idPropuesta->propuestaInscritas as $prop) {
            ?>
            <tr>
                <td><?php echo $prop->usuario0->username . " " . $prop->usuario0->nombre ?></td>

                <?php
                $evaluacionesDefensaGuia = EvaluacionDefensaGuia::model()->find('id_alumno=' . $prop->usuario0->id_usuario . ' and id_proyecto=' . $model->id_proyecto . ' and id_evaluacion_defensa_guia_padre is NULL');
                if ($evaluacionesDefensaGuia) {
                    echo "<td>" . CHtml::link($evaluacionesDefensaGuia->obtienePromedio(), array('evaluacionDefensaGuia/view', 'id' => $evaluacionesDefensaGuia->id_evaluacion_defensa_guia,), array('id' => 'inline')) . "</td>";
                    if (Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR)) || ($model->prof_guia == Yii::app()->user->id && $evalProyectoGuia->estado == Estado::$EVALUACION_PENDIENTE_DE_ENVIO)) {
                        echo "<td>" . CHtml::link($evaluacionesDefensaGuia->estado == Estado::$EVALUACION_PENDIENTE_DE_ENVIO?' Modificar ('.'Sin enviar)':' Modificar ('.'Enviada'.')', array('evaluacionDefensaGuia/update', 'id' => $evaluacionesDefensaGuia->id_evaluacion_defensa_guia,), array('id' => 'inline')) . "</td>";
                    }
                    echo "<td>" . CHtml::link('<img align="middle" title="Descarga esta vista en PDF" src="' . Yii::app()->request->baseUrl . '/images/pdf_icon.png"/>', array('evaluacionDefensaGuia/VerPDF', 'id' => $evaluacionesDefensaGuia->id_evaluacion_defensa_guia)) . "</td>";
                    //   echo "<td>Eval. Completa " . $evaluacionesDefensaGuia->evaluacionCompleta() ? 'SI' : 'NO' . "</td>";
                } else {
                    if (Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR)) || $model->prof_guia == Yii::app()->user->id) {
                        echo "<td>" . CHtml::link('Agregar Evaluación', array('evaluacionDefensaGuia/create', 'ida' => $prop->usuario0->id_usuario, 'idp' => $model->id_proyecto), array('id' => 'inline')) . "</td>";
                    } else {
                        echo ' ';
                    }
                }
                ?>

            </tr>
        <?php }
        ?>
    </table>

    <b>Profesor Informante:</b><?php echo $model->profInformante ? $model->profInformante->nombre : ''; ?>
    <table style="border-bottom:1px solid #FFF;">    
        <?php
        foreach ($model->idPropuesta->propuestaInscritas as $prop) {
            ?>
            <tr>
                <td><?php echo $prop->usuario0->username . " " . $prop->usuario0->nombre ?></td>

                <?php
                $evaluacionesDefensaInformante = EvaluacionDefensaInformante::model()->find('id_alumno=' . $prop->usuario0->id_usuario . ' and id_proyecto=' . $model->id_proyecto . ' and id_evaluacion_defensa_informante_padre is NULL');
                if ($evaluacionesDefensaInformante) {
                    echo "<td>" . CHtml::link($evaluacionesDefensaInformante->obtienePromedio(), array('evaluacionDefensaInformante/view', 'id' => $evaluacionesDefensaInformante->id_evaluacion_defensa_informante,), array('id' => 'inline')) . "</td>";
                    if (Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR)) || ($model->prof_informante == Yii::app()->user->id && $evalProyectoGuia->estado == Estado::$EVALUACION_PENDIENTE_DE_ENVIO)) {
                        echo "<td>" . CHtml::link($evaluacionesDefensaInformante->estado == Estado::$EVALUACION_PENDIENTE_DE_ENVIO?' Modificar ('.'Sin enviar)':' Modificar ('.'Enviada'.')', array('evaluacionDefensaInformante/update', 'id' => $evaluacionesDefensaInformante->id_evaluacion_defensa_informante,), array('id' => 'inline')) . "</td>";
                    }
                    echo "<td>" . CHtml::link('<img align="middle" title="Descarga esta vista en PDF" src="' . Yii::app()->request->baseUrl . '/images/pdf_icon.png"/>', array('evaluacionDefensaInformante/VerPDF', 'id' => $evaluacionesDefensaInformante->id_evaluacion_defensa_informante)) . " </td>";
                    // echo "<td>Eval. Completa " . $evaluacionesDefensaInformante->evaluacionCompleta() ? 'SI' : 'NO' . "</td>";
                } else {
                    if (Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR)) || $model->prof_informante == Yii::app()->user->id) {
                        echo "<td>" . CHtml::link('Agregar Evaluación', array('evaluacionDefensaInformante/create', 'ida' => $prop->usuario0->id_usuario, 'idp' => $model->id_proyecto), array('id' => 'inline')) . "</td>";
                    } else {
                        echo ' ';
                    }
                }
                ?>

            </tr>
        <?php }
        ?>
    </table>

    <b>Profesor Sala:</b><?php echo $model->profSala ? $model->profSala->nombre : ''; ?>
    <table style="border-bottom:1px solid #FFF;">    
        <?php
        foreach ($model->idPropuesta->propuestaInscritas as $prop) {
            ?>
            <tr>
                <td><?php echo $prop->usuario0->username . " " . $prop->usuario0->nombre ?></td>

                <?php
                $evaluacionesDefensaSala = EvaluacionDefensaSala::model()->find('id_alumno=' . $prop->usuario0->id_usuario . ' and id_proyecto=' . $model->id_proyecto . ' and id_evaluacion_defensa_sala_padre is NULL');
                if ($evaluacionesDefensaSala) {
                    echo "<td>" . CHtml::link($evaluacionesDefensaSala->obtienePromedio(), array('evaluacionDefensaSala/view', 'id' => $evaluacionesDefensaSala->id_evaluacion_defensa_sala,), array('id' => 'inline')) . "</td>";
                    if (Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR)) || ($model->prof_sala == Yii::app()->user->id && $evalProyectoGuia->estado == Estado::$EVALUACION_PENDIENTE_DE_ENVIO)) {
                        echo "<td>" . CHtml::link($evaluacionesDefensaSala->estado == Estado::$EVALUACION_PENDIENTE_DE_ENVIO?' Modificar ('.'Sin enviar)':' Modificar ('.'Enviada'.')', array('evaluacionDefensaSala/update', 'id' => $evaluacionesDefensaSala->id_evaluacion_defensa_sala,), array('id' => 'inline')) . "</td>";
                    }
                    echo "<td>" . CHtml::link('<img align="middle" title="Descarga esta vista en PDF" src="' . Yii::app()->request->baseUrl . '/images/pdf_icon.png"/>', array('evaluacionDefensaSala/VerPDF', 'id' => $evaluacionesDefensaSala->id_evaluacion_defensa_sala)) . " </td>";
                    // echo "<td>Eval. Completa " . $evaluacionesDefensaSala->evaluacionCompleta() ? 'SI' : 'NO' . "</td>";
                } else {
                    if (Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR)) || $model->prof_sala == Yii::app()->user->id) {
                        echo "<td>" . CHtml::link('Agregar Evaluación', array('evaluacionDefensaSala/create', 'ida' => $prop->usuario0->id_usuario, 'idp' => $model->id_proyecto), array('id' => 'inline')) . "</td>";
                    } else {
                        echo ' ';
                    }
                }
                ?>
            </tr>
        <?php }
        ?>

    </table>
</div>





<div class="recuadro">
    <h2>Etapa Final</h2>
    <b>Acta calificación de defensa</b>
    <table style="border-bottom:1px solid #FFF;">    
        <?php
        foreach ($model->idPropuesta->propuestaInscritas as $prop) {
            ?>
            <tr>
                <td><?php echo $prop->usuario0->username . " " . $prop->usuario0->nombre ?></td>

                <?php
                $evaluacionesDefensaSala = EvaluacionDefensaSala::model()->find('id_alumno=' . $prop->usuario0->id_usuario . ' and id_proyecto=' . $model->id_proyecto . ' and id_evaluacion_defensa_sala_padre is NULL');
                $evaluacionesDefensaInformante = EvaluacionDefensaInformante::model()->find('id_alumno=' . $prop->usuario0->id_usuario . ' and id_proyecto=' . $model->id_proyecto . ' and id_evaluacion_defensa_informante_padre is NULL');
                $evaluacionesDefensaGuia = EvaluacionDefensaGuia::model()->find('id_alumno=' . $prop->usuario0->id_usuario . ' and id_proyecto=' . $model->id_proyecto . ' and id_evaluacion_defensa_guia_padre is NULL');
                if ($evaluacionesDefensaSala != NULL && $evaluacionesDefensaInformante != NULL && $evaluacionesDefensaGuia != NULL) {
                    if ($evaluacionesDefensaSala->evaluacionCompleta() && $evaluacionesDefensaGuia->evaluacionCompleta() && $evaluacionesDefensaInformante->evaluacionCompleta()) {
                        //las evaluaciones están completas
                        if (Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR, Rol::$PROFESOR))) {
                            echo "<td>" . CHtml::link('Generar Acta de defensa', array('generarActaDefensa',
                                'id' => $model->id_proyecto,
                                'idEG' => $evaluacionesDefensaGuia->id_evaluacion_defensa_guia,
                                'idEI' => $evaluacionesDefensaInformante->id_evaluacion_defensa_informante,
                                'idES' => $evaluacionesDefensaSala->id_evaluacion_defensa_sala,
                                    )
                            ) . "</td>";
                            echo "<td>" . CHtml::link('<img align="middle" title="Descarga esta vista en PDF" src="' . Yii::app()->request->baseUrl . '/images/pdf_icon.png"/>', array('generarActaDefensa',
                                'id' => $model->id_proyecto,
                                'idEG' => $evaluacionesDefensaGuia->id_evaluacion_defensa_guia,
                                'idEI' => $evaluacionesDefensaInformante->id_evaluacion_defensa_informante,
                                'idES' => $evaluacionesDefensaSala->id_evaluacion_defensa_sala,
                                    )
                            ) . "</td>";
                        }
                    } else {
                        //faltan completar las evaluaciones
                        echo "<td>Faltan evaluaciones de la defensa por completar</td>";
                    }
                } else {
                    //faltan evaluaciones por crear
                    echo "<td>Faltan evaluaciones de la defensa por agregar</td>";
                }
                ?>
            </tr>
        <?php }
        ?>
    </table>


    <b>Acta calificación final</b>
    <table style="border-bottom:1px solid #FFF;">    
        <?php
        foreach ($model->idPropuesta->propuestaInscritas as $prop) {
            ?>
            <tr>
                <td><?php echo $prop->usuario0->username . " " . $prop->usuario0->nombre ?></td>

                <?php
                $evaluacionesDefensaSala = EvaluacionDefensaSala::model()->find('id_alumno=' . $prop->usuario0->id_usuario . ' and id_proyecto=' . $model->id_proyecto . ' and id_evaluacion_defensa_sala_padre is NULL');
                $evaluacionesDefensaInformante = EvaluacionDefensaInformante::model()->find('id_alumno=' . $prop->usuario0->id_usuario . ' and id_proyecto=' . $model->id_proyecto . ' and id_evaluacion_defensa_informante_padre is NULL');
                $evaluacionesDefensaGuia = EvaluacionDefensaGuia::model()->find('id_alumno=' . $prop->usuario0->id_usuario . ' and id_proyecto=' . $model->id_proyecto . ' and id_evaluacion_defensa_guia_padre is NULL');
                $evalProyectoGuia = EvaluacionProyectoGuia::model()->find('id_alumno=' . $prop->usuario0->id_usuario . ' and id_proyecto=' . $model->id_proyecto . ' and id_evaluacion_proyecto_guia_padre is NULL');
                $evaluacionesProyectoInformante = EvaluacionProyectoInformante::model()->find('id_alumno=' . $prop->usuario0->id_usuario . ' and id_proyecto=' . $model->id_proyecto . ' and id_evaluacion_proyecto_informante_padre is NULL');

                if ($evaluacionesDefensaSala != NULL && $evaluacionesDefensaInformante != NULL && $evaluacionesDefensaGuia != NULL && $evalProyectoGuia != NULL && $evaluacionesProyectoInformante != NULL) {
                    if ($evaluacionesDefensaSala->evaluacionCompleta() && $evaluacionesDefensaGuia->evaluacionCompleta() && $evaluacionesDefensaInformante->evaluacionCompleta() && $evalProyectoGuia->evaluacionCompleta() && $evaluacionesProyectoInformante->evaluacionCompleta()) {
                        //las evaluaciones están completas
                        if (Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR, Rol::$PROFESOR))) {

                            echo "<td>" . CHtml::link('Generar acta de calificación final (PDF)', array('generarActaFinal',
                                'id' => $model->id_proyecto,
                                'idEG' => $evaluacionesDefensaGuia->id_evaluacion_defensa_guia,
                                'idEI' => $evaluacionesDefensaInformante->id_evaluacion_defensa_informante,
                                'idES' => $evaluacionesDefensaSala->id_evaluacion_defensa_sala,
                                'idPEI' => $evaluacionesProyectoInformante->id_evaluacion_proyecto_informante,
                                'idPEG' => $evalProyectoGuia->id_evaluacion_proyecto_guia
                                    )
                            ) . "</td>";
                            echo "<td>" . CHtml::link('<img align="middle" title="Descarga esta vista en PDF" src="' . Yii::app()->request->baseUrl . '/images/pdf_icon.png"/>', array('generarActaFinal',
                                'id' => $model->id_proyecto,
                                'idEG' => $evaluacionesDefensaGuia->id_evaluacion_defensa_guia,
                                'idEI' => $evaluacionesDefensaInformante->id_evaluacion_defensa_informante,
                                'idES' => $evaluacionesDefensaSala->id_evaluacion_defensa_sala,
                                'idPEI' => $evaluacionesProyectoInformante->id_evaluacion_proyecto_informante,
                                'idPEG' => $evalProyectoGuia->id_evaluacion_proyecto_guia
                                    )
                            ) . "</td>";
                        }
                    } else {
                        //faltan completar las evaluaciones
                        echo "<td>Faltan evaluaciones de la defensa por completar</td>";
                    }
                } else {
                    //faltan evaluaciones por crear
                    echo "<td>Faltan evaluaciones de la defensa por agregar</td>";
                }
                ?>
            </tr>
        <?php }
        ?>
    </table>
</div>

<?php
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target' => 'a#inline',
    'config' => array(
        'scrolling' => 'no',
        'titleShow' => false,
    ),)
);
?>