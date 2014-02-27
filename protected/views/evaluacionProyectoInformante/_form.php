<?php
/* @var $this EvaluacionProyectoInformanteController */
/* @var $model EvaluacionProyectoInformante */
/* @var $form CActiveForm */
?>

<div class="form" style="width:700px;" >

    <p>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'evaluacion-proyecto-informante-form',
            'enableAjaxValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,)
        ));
        ?>
    </p>
    <p>A continuación Ud. encontrará una serie de afirmaciones, frente a las cuales se  le solicita marcar la calificación que, a su juicio, merece el  alumno en cada uno de los enunciados de acuerdo a las siguientes categorías. </p>
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
    <p>Los campos con <span class="required">*</span> son requeridos.</p>

    <?php echo $form->errorSummary($model); ?>
    <div align="center">  
        <p>NOTA FINAL: <span id="layoutNota" class="destacador"> <?php echo $model->obtienePromedio(); ?></span></p>
        <table class="tablaforms">
        
             <tr>
                <td colspan="3"><strong>Categorías / Escala de evaluación</strong></td>
                <td title="Definitivamente no"><strong>2</strong></td>
                <td title="En escasa medida"><strong>4</strong></td>
                <td title="Moderadamente"><strong>6</strong></td>
                <td title="En gran medida"><strong>8</strong></td>
                <td title="Definitivamente si"><strong>10</strong></td>
            </tr> 
            <tr>
              <td rowspan="9">Informe</td>
                <td>1</td>
                <td>
                    <?php echo $form->labelEx($model, 'informe_destaca_importante'); ?>&nbsp; </td>

                <td><?php echo $form->radioButton($model, 'informe_destaca_importante', array('value' => '2', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[2])); ?>&nbsp;</td>
                <td><?php echo $form->radioButton($model, 'informe_destaca_importante', array('value' => '4', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[4])); ?>&nbsp;</td>
                <td><?php echo $form->radioButton($model, 'informe_destaca_importante', array('value' => '6', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[6])); ?>&nbsp;</td>
                <td><?php echo $form->radioButton($model, 'informe_destaca_importante', array('value' => '8', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[8])); ?>&nbsp;</td>
                <td><?php echo $form->radioButton($model, 'informe_destaca_importante', array('value' => '10', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[10])); ?>&nbsp;</td>

            </tr> 


            <tr>
              <td>2</td>
                <td>
                    <?php echo $form->labelEx($model, 'informe_expone_claro'); ?>
                </td>

                <td><?php echo $form->radioButton($model, 'informe_expone_claro', array('value' => '2', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[2])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_expone_claro', array('value' => '4', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[4])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_expone_claro', array('value' => '6', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[6])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_expone_claro', array('value' => '8', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[8])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_expone_claro', array('value' => '10', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[10])); ?></td>

            </tr> 


            <tr>
              <td>3</td>
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
              <td>4</td>
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
              <td>5</td>
                <td>
                    <?php echo $form->labelEx($model, 'informe_opiniones_propias'); ?>
                </td>

                <td><?php echo $form->radioButton($model, 'informe_opiniones_propias', array('value' => '2', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[2])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_opiniones_propias', array('value' => '4', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[4])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_opiniones_propias', array('value' => '6', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[6])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_opiniones_propias', array('value' => '8', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[8])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_opiniones_propias', array('value' => '10', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[10])); ?></td>

            </tr> 
            <tr>
              <td>6</td>
                <td>
                    <?php echo $form->labelEx($model, 'informe_aportes_personales'); ?>
                </td>

                <td><?php echo $form->radioButton($model, 'informe_aportes_personales', array('value' => '2', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[2])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_aportes_personales', array('value' => '4', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[4])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_aportes_personales', array('value' => '6', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[6])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_aportes_personales', array('value' => '8', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[8])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_aportes_personales', array('value' => '10', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[10])); ?></td>

            </tr> 
            <tr>
              <td>7</td>
                <td>
                    <?php echo $form->labelEx($model, 'informe_domina_conceptos'); ?>
                </td>
                <td><?php echo $form->radioButton($model, 'informe_domina_conceptos', array('value' => '2', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[2])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_domina_conceptos', array('value' => '4', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[4])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_domina_conceptos', array('value' => '6', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[6])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_domina_conceptos', array('value' => '8', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[8])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_domina_conceptos', array('value' => '10', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[10])); ?></td>

            </tr> 
            <tr>
              <td>8</td>
                <td>
                    <?php echo $form->labelEx($model, 'informe_domina_tecnicas'); ?>
                </td>
                <td><?php echo $form->radioButton($model, 'informe_domina_tecnicas', array('value' => '2', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[2])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_domina_tecnicas', array('value' => '4', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[4])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_domina_tecnicas', array('value' => '6', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[6])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_domina_tecnicas', array('value' => '8', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[8])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_domina_tecnicas', array('value' => '10', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[10])); ?></td>

            </tr> 
            <tr>
              <td>9</td>
                <td>
                    <?php echo $form->labelEx($model, 'informe_cumple_objetivo'); ?>
                </td>
                <td><?php echo $form->radioButton($model, 'informe_cumple_objetivo', array('value' => '2', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[2])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_cumple_objetivo', array('value' => '4', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[4])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_cumple_objetivo', array('value' => '6', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[6])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_cumple_objetivo', array('value' => '8', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[8])); ?></td>
                <td><?php echo $form->radioButton($model, 'informe_cumple_objetivo', array('value' => '10', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[10])); ?></td>

            </tr> 
            <tr>
              <td rowspan="5">Producto</td>
                <td>10</td>
                <td>
                    <?php echo $form->labelEx($model, 'producto_ajusta_requerimientos'); ?>
                </td>
                <td><?php echo $form->radioButton($model, 'producto_ajusta_requerimientos', array('value' => '2', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[2])); ?></td>
                <td><?php echo $form->radioButton($model, 'producto_ajusta_requerimientos', array('value' => '4', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[4])); ?></td>
                <td><?php echo $form->radioButton($model, 'producto_ajusta_requerimientos', array('value' => '6', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[6])); ?></td>
                <td><?php echo $form->radioButton($model, 'producto_ajusta_requerimientos', array('value' => '8', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[8])); ?></td>
                <td><?php echo $form->radioButton($model, 'producto_ajusta_requerimientos', array('value' => '10', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[10])); ?></td>

            </tr> 
            <tr>
              <td>11</td>
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
              <td>12</td>
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
              <td>13</td>
                <td>
                    <?php echo $form->labelEx($model, 'producto_documentacion'); ?>
                </td>
                <td><?php echo $form->radioButton($model, 'producto_documentacion', array('value' => '2', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[2])); ?></td>
                <td><?php echo $form->radioButton($model, 'producto_documentacion', array('value' => '4', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[4])); ?></td>
                <td><?php echo $form->radioButton($model, 'producto_documentacion', array('value' => '6', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[6])); ?></td>
                <td><?php echo $form->radioButton($model, 'producto_documentacion', array('value' => '8', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[8])); ?></td>
                <td><?php echo $form->radioButton($model, 'producto_documentacion', array('value' => '10', 'uncheckValue' => null, 'onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota')), 'title' => Utilidades::$arrayPuntosEvaluacion[10])); ?></td>

            </tr> 
            <tr>
              <td>14</td>
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
                'submit' => array('create', 'ida' => $model->id_alumno, 'idp' => $model->id_proyecto),
                    //'confirm' => '¿Desea guardar los cambios?'
                    )
            );

            echo CHtml::submitButton('Guardar y Enviar', array(
                'submit' => array('createYRevision', 'ida' => $model->id_alumno, 'idp' => $model->id_proyecto),
                    //'confirm' => '¿Seguro que desea enviar la evaluación?, después ya no podrá editarla'
                    // or you can use 'params'=>array('id'=>$id)
                    )
            );
        } else {
            echo CHtml::submitButton('Guardar cambios', array(
                'submit' => array('update', 'id' => $model->id_evaluacion_proyecto_informante),
                'style' => 'display:none;')
            );
            echo CHtml::submitButton('Guardar cambios', array(
                'submit' => array('update', 'id' => $model->id_evaluacion_proyecto_informante),
                    //'confirm' => '¿Desea guardar los cambios?'
                    )
            );

            echo CHtml::submitButton('Guardar y Enviar', array(
                'submit' => array('updateYRevision', 'id' => $model->id_evaluacion_proyecto_informante),
                    //'confirm' => '¿Seguro que desea enviar la evaluación?, después ya no podrá editarla'
                    // or you can use 'params'=>array('id'=>$id)
                    )
            );
        }
        ?>


        <?php $this->endWidget(); ?>
    </div>

</div>
<!-- form -->