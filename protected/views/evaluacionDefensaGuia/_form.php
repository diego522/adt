<?php
/* @var $this EvaluacionDefensaGuiaController */
/* @var $model EvaluacionDefensaGuia */
/* @var $form CActiveForm */
?>

<div class="form" style="width:700px;" >

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'evaluacion-defensa-guia-form',
        'enableAjaxValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,)
    ));
    ?>


    <p>A continuación Usted  encontrará una serie de afirmaciones, frente a las cuales se le solicita  marcar la calificación que, a su juicio, merece el alumno en cada uno de los  enunciados, en el rango de 1 a  10 puntos.</p>
    <p class="note">Los campos con <span class="required">*</span> son requeridos.</p>
    <div align="center">
        <p>NOTA FINAL: <span id="layoutNota"  class="destacador"> <?php echo $model->obtienePromedio(); ?></span></p>
    </div>
    <?php echo $form->errorSummary($model); ?>
    <table class="tablaforms">
        <tr>
            <td rowspan="5">Aspectos  Generales</td>
            <td>1</td>
            <td>
                <?php echo $form->labelEx($model, 'general_formal'); ?>&nbsp;</td>

            <td>
                <?php
                echo CHtml::activeDropDownList($model, 'general_formal', Utilidades::$arrayPuntosEvaluacionDefensa, array('onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota'))));
                ?>
                <?php //echo $form->error($model, 'general_formal'); ?>
            </td>
        </tr>    

        <tr>
            <td>2</td>
            <td>
                <?php echo $form->labelEx($model, 'general_seguridad'); ?>
            </td>

            <td>
                <?php
                echo CHtml::activeDropDownList($model, 'general_seguridad', Utilidades::$arrayPuntosEvaluacionDefensa, array('onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota'))));
                ?>
                <?php //echo $form->error($model, 'general_seguridad'); ?>
            </td>
        </tr> 

        <tr>
            <td>3</td>
            <td>
                <?php echo $form->labelEx($model, 'general_uso_medios'); ?>
            </td>

            <td>
                <?php
                echo CHtml::activeDropDownList($model, 'general_uso_medios', Utilidades::$arrayPuntosEvaluacionDefensa, array('onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota'))));
                ?>
                <?php //echo $form->error($model, 'general_uso_medios'); ?>
            </td>
        </tr> 
        <tr>
            <td>4</td>
            <td>
                <?php echo $form->labelEx($model, 'general_planifica_presentacion'); ?>
            </td>

            <td>
                <?php
                echo CHtml::activeDropDownList($model, 'general_planifica_presentacion', Utilidades::$arrayPuntosEvaluacionDefensa, array('onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota'))));
                ?>
                <?php //echo $form->error($model, 'general_planifica_presentacion'); ?>
            </td>
        </tr> 
        <tr>
            <td>5</td>
            <td>
                <?php echo $form->labelEx($model, 'general_material_visual'); ?>
            </td>

            <td>
                <?php
                echo CHtml::activeDropDownList($model, 'general_material_visual', Utilidades::$arrayPuntosEvaluacionDefensa, array('onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota'))));
                ?>
                <?php //echo $form->error($model, 'general_material_visual'); ?>
            </td>
        </tr> 
        <tr>
            <td rowspan="5">Aspectos  Específicos</td>
            <td>1</td>
            <td>
                <?php echo $form->labelEx($model, 'especifico_claridad'); ?>
            </td>

            <td>
                <?php
                echo CHtml::activeDropDownList($model, 'especifico_claridad', Utilidades::$arrayPuntosEvaluacionDefensa, array('onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota'))));
                ?>
                <?php //echo $form->error($model, 'especifico_claridad'); ?>
            </td>
        </tr> 
        <tr>
            <td>2</td>
            <td>
                <?php echo $form->labelEx($model, 'especifico_destaca_aspectos'); ?>
            </td>

            <td>
                <?php
                echo CHtml::activeDropDownList($model, 'especifico_destaca_aspectos', Utilidades::$arrayPuntosEvaluacionDefensa, array('onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota'))));
                ?>
                <?php //echo $form->error($model, 'especifico_destaca_aspectos'); ?>
            </td>
        </tr> 
        <tr>
            <td>3</td>
            <td>
                <?php echo $form->labelEx($model, 'especifico_conclusiones'); ?>
            </td>

            <td>
                <?php
                echo CHtml::activeDropDownList($model, 'especifico_conclusiones', Utilidades::$arrayPuntosEvaluacionDefensa, array('onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota'))));
                ?>
                <?php //echo $form->error($model, 'especifico_conclusiones'); ?>
            </td>
        </tr> 
        <tr>
            <td>4</td>
            <td>
                <?php echo $form->labelEx($model, 'especifico_respuestas'); ?>
            </td>

            <td>
                <?php
                echo CHtml::activeDropDownList($model, 'especifico_respuestas', Utilidades::$arrayPuntosEvaluacionDefensa, array('onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota'))));
                ?>
                <?php //echo $form->error($model, 'especifico_respuestas'); ?>
            </td>
        </tr> 
        <tr>
            <td>5</td>
            <td>
                <?php echo $form->labelEx($model, 'especifico_desempeño'); ?>
            </td>

            <td>
                <?php
                echo CHtml::activeDropDownList($model, 'especifico_desempeño', Utilidades::$arrayPuntosEvaluacionDefensa, array('onchange' => CHtml::ajax(array('type' => 'GET', 'url' => array("calculaNota"), 'update' => '#layoutNota'))));
                ?>
                <?php //echo $form->error($model, 'especifico_desempeño'); ?>
            </td>
        </tr> 

    </table>

    <div class="row">
        <?php echo $form->labelEx($model, 'comentarios'); ?><br />
        <?php echo $form->textArea($model, 'comentarios', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'comentarios'); ?>
    </div>

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
                'submit' => array('update', 'id' => $model->id_evaluacion_defensa_guia),
                'style' => 'display:none;')
            );

            echo CHtml::submitButton('Guardar cambios', array(
                'submit' => array('update', 'id' => $model->id_evaluacion_defensa_guia),
                    //'confirm' => '¿Desea guardar los cambios?'
                    )
            );

            echo CHtml::submitButton('Guardar y Enviar', array(
                'submit' => array('updateYRevision', 'id' => $model->id_evaluacion_defensa_guia),
                    //'confirm' => '¿Seguro que desea enviar la evaluación?, después ya no podrá editarla'
                    // or you can use 'params'=>array('id'=>$id)
                    )
            );
        }
        ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->