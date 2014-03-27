<?php
/* @var $this EvaluacionProyectoGuiaController */
/* @var $model EvaluacionProyectoGuia */
/* @var $form CActiveForm */
?>

<div class="form" style="width:700px;" >

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'evaluacion-proyecto-guia-form',
        'enableAjaxValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,)
    ));
    ?>
    <p> <?php echo $form->errorSummary($model); ?></p>
    <p>En primer lugar usted deberá indicar si el alumno logró los objetivos  planteados en su actividad de titulación. Si no se lograron los objetivos  dentro de un mínimo aceptable, entonces se considerará reprobada la actividad  de titulación y la nota deberá ser menor a 60 puntos. Esta nota quedará a  criterio del profesor guía y deberá ser puesta al final de esta pauta de  evaluación.</p>
    <div align="center">

        <p><strong>¿Se cumplieron los objetivos planteados?</strong></p>
        <p>
            <span class="destacador2">Si
                <?php echo $form->radioButton($model, 'cumple_objetivo', array('value' => '1', 'uncheckValue' => null)); ?>
            </span>&nbsp;&nbsp;
            <span class="destacador2">No
                <?php echo $form->radioButton($model, 'cumple_objetivo', array('value' => '2', 'uncheckValue' => null)); ?>
            </span>
        </p>
    </div>
    <p>Si se cumplieron los objetivos, entonces Usted deberá evaluar el trabajado  del o los alumnos en cuanto al proceso de desarrollo, informe y producto final.  A continuación usted encontrará una serie de afirmaciones, frente a las cuales se  le solicita marcar la calificación que, a su juicio, merece el  alumno en cada uno de los enunciados de acuerdo a las siguientes categorías. </p>

    <div align="center">  
        <table class="tablaforms" style="width: 200px;"   border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td width="46" valign="top"><p align="center">2</p></td>
                <td width="143" valign="top"><p>Definitivamente    no</p></td>
            </tr>
            <tr>
                <td width="46" valign="top"><p align="center">4</p></td>
                <td width="143" valign="top"><p>En    escasa medida</p></td>
            </tr>
            <tr>
                <td width="46" valign="top"><p align="center">6</p></td>
                <td width="143" valign="top"><p>Moderadamente</p></td>
            </tr>
            <tr>
                <td width="46" valign="top"><p align="center">8</p></td>
                <td width="143" valign="top"><p>En    gran medida</p></td>
            </tr>
            <tr>
                <td width="46" valign="top"><p align="center">10</p></td>
                <td width="143" valign="top"><p>Definitivamente    si</p></td>
            </tr>
        </table>
    </div>
    <p>Los campos con <span class="required">*</span> son requeridos.<br /></p>


    <div align="center">  
        <p>NOTA FINAL:  <span id="layoutNota" class="destacador"> <?php echo $model->obtienePromedio(); ?></span></p>

        <table class="tablaforms" border="0" cellspacing="0" >
            <tr>
                <td colspan="3"><strong>Categorías / Escala de evaluación</strong></td>
                <td title="Definitivamente no"><strong>2</strong></td>
                <td title="En escasa medida"><strong>4</strong></td>
                <td title="Moderadamente"><strong>6</strong></td>
                <td title="En gran medida"><strong>8</strong></td>
                <td title="Definitivamente si"><strong>10</strong></td>
            </tr> 
            <tr>
                <td rowspan="3">Proceso de desarrollo</td>
                <td>1</td>
                <td><?php echo $form->labelEx($model, 'desarrollo_cumple_plazo'); ?>&nbsp;</td>
                <td><?php echo $form->radioButton($model, 'desarrollo_cumple_plazo', array('value' => '2', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[2])); ?></td>
                <td><?php echo $form->radioButton($model, 'desarrollo_cumple_plazo', array('value' => '4', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[4])); ?></td>
                <td><?php echo $form->radioButton($model, 'desarrollo_cumple_plazo', array('value' => '6', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[6])); ?></td>
                <td><?php echo $form->radioButton($model, 'desarrollo_cumple_plazo', array('value' => '8', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[8])); ?></td>
                <td><?php echo $form->radioButton($model, 'desarrollo_cumple_plazo', array('value' => '10', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[10])); ?></td>
            </tr>  

            <tr>
                <td>2</td>
                <td><?php echo $form->labelEx($model, 'desarrollo_manifiesta_iniciativa'); ?></td>
                <td><?php echo $form->radioButton($model, 'desarrollo_manifiesta_iniciativa', array('value' => '2', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[2])); ?></td>
                <td><?php echo $form->radioButton($model, 'desarrollo_manifiesta_iniciativa', array('value' => '4', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[4])); ?></td>
                <td><?php echo $form->radioButton($model, 'desarrollo_manifiesta_iniciativa', array('value' => '6', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[6])); ?></td>
                <td><?php echo $form->radioButton($model, 'desarrollo_manifiesta_iniciativa', array('value' => '8', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[8])); ?></td>
                <td><?php echo $form->radioButton($model, 'desarrollo_manifiesta_iniciativa', array('value' => '10', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[10])); ?></td>
            </tr>  

            <tr>
                <td>3</td>
                <td><?php echo $form->labelEx($model, 'desarrollo_desarrolla_conocimiento'); ?></td>
                <td><?php echo $form->radioButton($model, 'desarrollo_desarrolla_conocimiento', array('value' => '2', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[2])); ?></td>
                <td><?php echo $form->radioButton($model, 'desarrollo_desarrolla_conocimiento', array('value' => '4', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[4])); ?></td>
                <td><?php echo $form->radioButton($model, 'desarrollo_desarrolla_conocimiento', array('value' => '6', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[6])); ?></td>
                <td><?php echo $form->radioButton($model, 'desarrollo_desarrolla_conocimiento', array('value' => '8', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[8])); ?></td>
                <td><?php echo $form->radioButton($model, 'desarrollo_desarrolla_conocimiento', array('value' => '10', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[10])); ?></td>
            </tr>  

            <tr>
                <td rowspan="5">Informe</td>
                <td>4</td>
                <td>
                    <?php echo $form->labelEx($model, 'informe_destaca_importante'); ?>
                </td>
                <td><?php echo $form->radioButton($model, 'informe_destaca_importante', array('value' => '2', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[2])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_destaca_importante', array('value' => '4', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[4])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_destaca_importante', array('value' => '6', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[6])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_destaca_importante', array('value' => '8', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[8])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_destaca_importante', array('value' => '10', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[10])); ?></td>
            </tr>  

            <tr>
                <td>5</td>
                <td>
                    <?php echo $form->labelEx($model, 'informe_expone_claramente'); ?>
                </td>
                <td><?php echo $form->radioButton($model, 'informe_expone_claramente', array('value' => '2', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[2])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_expone_claramente', array('value' => '4', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[4])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_expone_claramente', array('value' => '6', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[6])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_expone_claramente', array('value' => '8', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[8])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_expone_claramente', array('value' => '10', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[10])); ?></td>
            </tr>  

            <tr>
                <td>6</td>
                <td>
                    <?php echo $form->labelEx($model, 'informe_bien_estructurado'); ?>
                </td>
                <td><?php echo $form->radioButton($model, 'informe_bien_estructurado', array('value' => '2', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[2])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_bien_estructurado', array('value' => '4', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[4])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_bien_estructurado', array('value' => '6', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[6])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_bien_estructurado', array('value' => '8', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[8])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_bien_estructurado', array('value' => '10', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[10])); ?></td>
            </tr>  

            <tr>
                <td>7</td>
                <td>
                    <?php echo $form->labelEx($model, 'informe_adecuada_bibliografia'); ?>
                </td>
                <td><?php echo $form->radioButton($model, 'informe_adecuada_bibliografia', array('value' => '2', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[2])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_adecuada_bibliografia', array('value' => '4', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[4])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_adecuada_bibliografia', array('value' => '6', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[6])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_adecuada_bibliografia', array('value' => '8', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[8])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_adecuada_bibliografia', array('value' => '10', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[10])); ?></td>
            </tr>  

            <tr>
                <td>8</td>
                <td>
                    <?php echo $form->labelEx($model, 'informe_plantea_opinion'); ?>
                </td>
                <td><?php echo $form->radioButton($model, 'informe_plantea_opinion', array('value' => '2', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[2])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_plantea_opinion', array('value' => '4', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[4])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_plantea_opinion', array('value' => '6', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[6])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_plantea_opinion', array('value' => '8', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[8])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_plantea_opinion', array('value' => '10', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[10])); ?></td>
            </tr>     

            <tr>
                <td rowspan="5">Producto</td>
                <td>9</td>
                <td>
                    <?php echo $form->labelEx($model, 'producto_ajusta_requerimiento'); ?>
                </td>
                <td><?php echo $form->radioButton($model, 'producto_ajusta_requerimiento', array('value' => '2', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[2])); ?></td>
                <td><?php echo $form->radioButton($model, 'producto_ajusta_requerimiento', array('value' => '4', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[4])); ?></td>
                <td><?php echo $form->radioButton($model, 'producto_ajusta_requerimiento', array('value' => '6', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[6])); ?></td>
                <td><?php echo $form->radioButton($model, 'producto_ajusta_requerimiento', array('value' => '8', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[8])); ?></td>
                <td><?php echo $form->radioButton($model, 'producto_ajusta_requerimiento', array('value' => '10', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[10])); ?></td>
            </tr>  

            <tr>
                <td>10</td>
                <td>
                    <?php echo $form->labelEx($model, 'producto_interfaz_adecuada'); ?>
                </td>
                <td><?php echo $form->radioButton($model, 'producto_interfaz_adecuada', array('value' => '2', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[2])); ?></td>
                <td><?php echo $form->radioButton($model, 'producto_interfaz_adecuada', array('value' => '4', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[4])); ?></td>
                <td><?php echo $form->radioButton($model, 'producto_interfaz_adecuada', array('value' => '6', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[6])); ?></td>
                <td><?php echo $form->radioButton($model, 'producto_interfaz_adecuada', array('value' => '8', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[8])); ?></td>
                <td><?php echo $form->radioButton($model, 'producto_interfaz_adecuada', array('value' => '10', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[10])); ?></td>
            </tr>  

            <tr>
                <td>11</td>
                <td>
                    <?php echo $form->labelEx($model, 'producto_robustez'); ?>
                </td>
                <td><?php echo $form->radioButton($model, 'producto_robustez', array('value' => '2', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[2])); ?></td>
                <td><?php echo $form->radioButton($model, 'producto_robustez', array('value' => '4', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[4])); ?></td>
                <td><?php echo $form->radioButton($model, 'producto_robustez', array('value' => '6', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[6])); ?></td>
                <td><?php echo $form->radioButton($model, 'producto_robustez', array('value' => '8', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[8])); ?></td>
                <td><?php echo $form->radioButton($model, 'producto_robustez', array('value' => '10', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[10])); ?></td>
            </tr>  

            <tr>
                <td>12</td>
                <td>
                    <?php echo $form->labelEx($model, 'producto_documentacion_completa'); ?>
                </td>
                <td><?php echo $form->radioButton($model, 'producto_documentacion_completa', array('value' => '2', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[2])); ?></td>
                <td><?php echo $form->radioButton($model, 'producto_documentacion_completa', array('value' => '4', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[4])); ?></td>
                <td><?php echo $form->radioButton($model, 'producto_documentacion_completa', array('value' => '6', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[6])); ?></td>
                <td><?php echo $form->radioButton($model, 'producto_documentacion_completa', array('value' => '8', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[8])); ?></td>
                <td><?php echo $form->radioButton($model, 'producto_documentacion_completa', array('value' => '10', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[10])); ?></td>
            </tr>  

            <tr>
                <td>13</td>
                <td>
                    <?php echo $form->labelEx($model, 'producto_especifica_proceso'); ?>
                </td>
                <td><?php echo $form->radioButton($model, 'producto_especifica_proceso', array('value' => '2', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[2])); ?></td>
                <td><?php echo $form->radioButton($model, 'producto_especifica_proceso', array('value' => '4', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[4])); ?></td>
                <td><?php echo $form->radioButton($model, 'producto_especifica_proceso', array('value' => '6', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[6])); ?></td>
                <td><?php echo $form->radioButton($model, 'producto_especifica_proceso', array('value' => '8', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[8])); ?></td>
                <td><?php echo $form->radioButton($model, 'producto_especifica_proceso', array('value' => '10', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[10])); ?></td>
            </tr>  
        </table>
    </div>
    <p><?php echo $form->labelEx($model, 'comentarios'); ?>
        <br />
        <?php echo $form->textArea($model, 'comentarios', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'comentarios'); ?>


    </p>
    <div class="row buttons">
        <?php
        if ($model->isNewRecord) {
            echo CHtml::submitButton('Guardar cambios', array(
                'submit' => array('update', 'ida' => $model->id_alumno, 'idp' => $model->id_proyecto),
                'style' => 'display:none;')
            );

            echo CHtml::submitButton('Guardar cambios', array(
                'submit' => array('create', 'ida' => $model->id_alumno, 'idp' => $model->id_proyecto),)
            );

            echo CHtml::submitButton('Guardar y Enviar', array(
                'submit' => array('createYRevision', 'ida' => $model->id_alumno, 'idp' => $model->id_proyecto),)
            );
        } else {
            echo CHtml::submitButton('Guardar cambios', array(
                'submit' => array('update', 'id' => $model->id_evaluacion_proyecto_guia),
                'style' => 'display:none;')
            );

            echo CHtml::submitButton('Guardar cambios', array(
                'submit' => array('update', 'id' => $model->id_evaluacion_proyecto_guia),)
            );

            echo CHtml::submitButton('Guardar y Enviar', array(
                'submit' => array('updateYRevision', 'id' => $model->id_evaluacion_proyecto_guia),)
            );
        }
        ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->