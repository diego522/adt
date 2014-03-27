<?php
/* @var $this EvaluacionDefensaGuiaController */
/* @var $model EvaluacionDefensaGuia */
?>
<style type="text/css">
    body
    {
        margin-left:100px;
        padding: 0;
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        font-size: 9pt;
        font-style: normal;
        font-weight: normal;
        font-variant: normal;
    }

    #page
    {
        margin-top: 5px;
        margin-bottom: 5px;
        background: white;
        border: 1px solid #C9E0ED;
    }
    div.titulo{
        padding-top:-10px;
        text-align: center;
    }
    #header
    {
        margin: 0;
        padding: 0;
        border-top: 3px solid #C9E0ED;
    }
    p{
        text-align: justify;
    }
    #content
    {
        padding: 20px;
    }

    .titulo
    {
        text-align: center;
    }
    .final
    {
        text-align: center;
    }

    #footer
    {
        padding: 10px;
        margin: 10px 20px;
        font-size: 0.8em;
        text-align: center;
        border-top: 1px solid #C9E0ED;
    }



    .logo{

        /*padding-top:-60px;  */      
        text-align:center;
    }


    .tablaforms{
        border:#000 solid 6px;


    }

</style>

<page backtop="2mm" backbottom="0mm" backleft="20mm" backright="20mm">
    <div class="logo">
        <?php echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/escudo_ubb.png", ''); ?>
    </div>
    <div class="titulo">
        <h3>Evaluación Actividad de Titulación - Profesor Guía</h3>
        <h4 style="margin-top:-10px;"> Facultad de Ciencias Empresariales</h4>
        <h4 style="margin-top:-10px;"> Escuela de Ingeniería Civil Informática</h4>

    </div>


    <table width="548">
        <tr>
            <td width="90" valign="top"><b>Título:</b></td>
            <td width="500"  ><?php echo $model->idProyecto->idPropuesta->titulo; ?></td>
        </tr>
        <tr>
            <td valign="top"><b>Profesor:</b></td>
            <td width="500"><?php echo $model->idProyecto->profGuia->nombre; ?></td>
        </tr>
        <tr>
            <td valign="top"><b>Alumno(a):</b></td>
            <td width="500"><?php echo $model->idAlumno->nombre; ?></td>
        </tr>
        <tr>
            <td valign="top"><b>Fecha:</b></td>
            <td width="500"><?php echo $model->fecha_actualizacion; ?></td>
        </tr>

    </table>
    <p style="font-size:11px;">En primer lugar Usted deberá indicar si el alumno logró los objetivos  planteados en su actividad de titulación. Si no se lograron los objetivos  dentro de un mínimo aceptable, entonces se considerará reprobada la actividad  de titulación y la nota deberá ser menor a 60 puntos. Esta nota quedará a  criterio del profesor guía y deberá ser puesta al final de esta pauta de evaluación.</p>

    <div align="center">
        <span align="center"><strong>¿Se cumplieron los objetivos planteados?</strong> </span>
        <table bgcolor="#000000" width="30" height="1" border="0" align="center" cellpadding="0" cellspacing="2">
            <tr>
                <td width="46" height="1" align="center" valign="middle" bgcolor="#FFFFFF" style="margin-top:-5px;">Si</td>
                <td width="143" height="1" valign="middle" bgcolor="#FFFFFF" style="margin-top:-5px;"><span class="destacador2">
                        <?php
                        if ($model->cumple_objetivo == '1') {
                            echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                        } else {
                            echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                        }
                        ?>

                    </span></td>
            </tr>
            <tr>
                <td width="46" align="center" valign="middle" bgcolor="#FFFFFF">No</td>
                <td width="143" valign="middle" bgcolor="#FFFFFF"><span class="destacador2">
                        <?php
                        if ($model->cumple_objetivo == '2') {
                            echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                        } else {
                            echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                        }
                        ?>

                    </span></td>
            </tr>
        </table>

    </div>
    <p style="font-size:11px;">Si se cumplieron los objetivos, entonces Usted deberá evaluar el trabajado  del o los alumnos en cuanto al proceso de desarrollo, informe y producto final.  A continuación Usted encontrará una serie de afirmaciones, frente a las cuales se  le solicita encerrar en un círculo la calificación que, a su juicio, merece el  alumno en cada uno de los enunciados de acuerdo a las siguientes categorías. </p>
    <table style="font-size:12px;" bgcolor="#000000" border="0" align="center"  cellspacing="2">
        <tr>
            <td width="46" align="center" valign="middle" bgcolor="#FFFFFF"><strong>2</strong></td>
            <td width="143" valign="middle" bgcolor="#FFFFFF"><strong>Definitivamente no</strong></td>
        </tr>
        <tr>
            <td width="46" align="center" valign="middle" bgcolor="#FFFFFF"><strong>4</strong></td>
            <td width="143" valign="middle" bgcolor="#FFFFFF"><strong>En escasa medida</strong></td>
        </tr>
        <tr>
            <td width="46" align="center" valign="middle" bgcolor="#FFFFFF"><strong>6</strong></td>
            <td width="143" valign="middle" bgcolor="#FFFFFF"><strong>Moderadamente</strong></td>
        </tr>
        <tr>
            <td width="46" align="center" valign="middle" bgcolor="#FFFFFF"><strong>8</strong></td>
            <td width="143" valign="middle" bgcolor="#FFFFFF"><strong>En gran medida</strong></td>
        </tr>
        <tr>
            <td width="46" align="center" valign="middle" bgcolor="#FFFFFF"><strong>10</strong></td>
            <td width="143" valign="middle" bgcolor="#FFFFFF"><strong>Definitivamente si</strong></td>
        </tr>
    </table>
    <br />


    <div>
        <table style="font-size:14px;" bgcolor="#000000"  border="0" cellspacing="2" width="600";>



            <tr>
                <td colspan="3" bgcolor="#FFFFFF"><strong>Categorías / Escala de evaluación</strong></td>

                <td align="center" bgcolor="#FFFFFF" title="Definitivamente no"><strong>2</strong></td>
                <td align="center" bgcolor="#FFFFFF" title="En escasa medida"><strong>4</strong></td>
                <td align="center" bgcolor="#FFFFFF" title="Moderadamente"><strong>6</strong></td>
                <td align="center" bgcolor="#FFFFFF" title="En gran medida"><strong>8</strong></td>
                <td align="center" bgcolor="#FFFFFF" title="Definitivamente si"><strong>10</strong></td>
            </tr>  

            <tr>
                <td rowspan="3" bgcolor="#FFFFFF">Proceso de&nbsp;<br />
                    desarrollo</td>
                <td align="center" bgcolor="#FFFFFF">&nbsp;1&nbsp;</td>
              <td bgcolor="#FFFFFF">El alumno ha cumplido con los plazos establecidos</td>
                <td bgcolor="#FFFFFF"><?php
                        if ($model->desarrollo_cumple_plazo == '2') {
                            echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                        } else {
                            echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                        }
                        ?></td>

                <td bgcolor="#FFFFFF"><?php
                    if ($model->desarrollo_cumple_plazo == '4') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->desarrollo_cumple_plazo == '6') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->desarrollo_cumple_plazo == '8') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->desarrollo_cumple_plazo == '10') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
            </tr>

            <tr>
                <td align="center" bgcolor="#FFFFFF">2</td>
                <td bgcolor="#FFFFFF">El alumno ha manifestado iniciativas propias que han
                  permitido &nbsp;<br />
                    enriquecer su trabajo</td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->desarrollo_manifiesta_iniciativa == '2') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->desarrollo_manifiesta_iniciativa == '4') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->desarrollo_manifiesta_iniciativa == '6') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->desarrollo_manifiesta_iniciativa == '8') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->desarrollo_manifiesta_iniciativa == '10') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>

            </tr>  

            <tr>
                <td align="center" bgcolor="#FFFFFF">3</td>
              <td bgcolor="#FFFFFF">El alumno muestra desarrollo del conocimiento en el  tema</td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->desarrollo_desarrolla_conocimiento == '2') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->desarrollo_desarrolla_conocimiento == '4') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->desarrollo_desarrolla_conocimiento == '6') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->desarrollo_desarrolla_conocimiento == '8') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->desarrollo_desarrolla_conocimiento == '10') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>

            </tr>  

            <tr>
                <td rowspan="5" bgcolor="#FFFFFF">Informe</td>
                <td align="center" bgcolor="#FFFFFF">4</td>
              <td bgcolor="#FFFFFF">El informe destaca lo importante del tema</td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->informe_destaca_importante == '2') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->informe_destaca_importante == '4') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->informe_destaca_importante == '6') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->informe_destaca_importante == '8') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->informe_destaca_importante == '10') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>

            </tr>  

            <tr>
                <td align="center" bgcolor="#FFFFFF">5</td>
              <td bgcolor="#FFFFFF">El informe expone claramente el tema</td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->informe_expone_claramente == '2') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->informe_expone_claramente == '4') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->informe_expone_claramente == '6') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->informe_expone_claramente == '8') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->informe_expone_claramente == '10') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>

            </tr>  

            <tr>
                <td align="center" bgcolor="#FFFFFF">6</td>
                <td bgcolor="#FFFFFF">El informe se encuentra bien estructurado
              </td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->informe_bien_estructurado == '2') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->informe_bien_estructurado == '4') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->informe_bien_estructurado == '6') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->informe_bien_estructurado == '8') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->informe_bien_estructurado == '10') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>

            </tr>  

            <tr>
                <td align="center" bgcolor="#FFFFFF">7</td>
                <td bgcolor="#FFFFFF">
                    Se ha realizado una adecuada revisión bibliográfica
              </td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->informe_adecuada_bibliografia == '2') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->informe_adecuada_bibliografia == '4') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->informe_adecuada_bibliografia == '6') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->informe_adecuada_bibliografia == '8') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->informe_adecuada_bibliografia == '10') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>

            </tr>  

            <tr>
                <td align="center" bgcolor="#FFFFFF">8</td>
                <td bgcolor="#FFFFFF">
                  Plantea opiniones, conclusiones y/o aportes personales</td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->informe_plantea_opinion == '2') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->informe_plantea_opinion == '4') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->informe_plantea_opinion == '6') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->informe_plantea_opinion == '8') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->informe_plantea_opinion == '10') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>

            </tr>     

            <tr>
                <td rowspan="5" bgcolor="#FFFFFF">Producto</td>
                <td align="center" bgcolor="#FFFFFF">9</td>
              <td bgcolor="#FFFFFF">Se ajusta a los requerimientos iniciales</td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->producto_ajusta_requerimiento == '2') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->producto_ajusta_requerimiento == '4') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->producto_ajusta_requerimiento == '6') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->producto_ajusta_requerimiento == '8') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->producto_ajusta_requerimiento == '10') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>

            </tr>  

            <tr>
                <td align="center" bgcolor="#FFFFFF">10</td>
              <td bgcolor="#FFFFFF">Interfaz adecuada</td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->producto_interfaz_adecuada == '2') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->producto_interfaz_adecuada == '4') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->producto_interfaz_adecuada == '6') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->producto_interfaz_adecuada == '8') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->producto_interfaz_adecuada == '10') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>

            </tr>  

            <tr>
                <td align="center" bgcolor="#FFFFFF">11</td>
              <td bgcolor="#FFFFFF">Robustez</td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->producto_robustez == '2') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->producto_robustez == '4') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->producto_robustez == '6') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->producto_robustez == '8') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->producto_robustez == '10') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>

            </tr>  

            <tr>
                <td align="center" bgcolor="#FFFFFF">12</td>
              <td bgcolor="#FFFFFF">Documentación completa incorporada al informe</td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->producto_documentacion_completa == '2') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->producto_documentacion_completa == '4') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->producto_documentacion_completa == '6') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->producto_documentacion_completa == '8') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->producto_documentacion_completa == '10') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>

            </tr>  

            <tr>
                <td align="center" bgcolor="#FFFFFF">13</td>
              <td bgcolor="#FFFFFF">Especifica proceso de desarrollo de software</td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->producto_especifica_proceso == '2') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->producto_especifica_proceso == '4') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->producto_especifica_proceso == '6') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->producto_especifica_proceso == '8') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td bgcolor="#FFFFFF"><?php
                    if ($model->producto_especifica_proceso == '10') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>

            </tr>  

        </table>

    </div>

    <div>
        <br />
    La calificación final se obtiene de la siguiente forma:<br />
        NF = (<?php echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/sigma.jpg", '', array('width' => '10')); ?> puntajes obtenidos en cada enunciado) / 1.3 </div>
    <div>
        <h4>NOTA FINAL: <?php echo $model->obtienePromedio() ?></h4> 
    </div><br />
<br />

    <table width="600" border="0">
        <tr>
            <td width="244" align="center">__________________________<br/>
<?php echo PeticionesWebService::obtieneNombreJefe(Yii::app()->user->getState('campus')) ?><br/>
                Jefe de Carrera/Director(a) de Escuela</td>
          <td width="133">&nbsp;</td>
            <td width="209" align="center">        __________________________<br/>
<?php echo $model->idProyecto->profGuia->nombre; ?><br/>
                Profesor(a) Guía</td>
        </tr>
    </table>

    <div> 
        <h6>Emitido el <?php echo date('d/m/Y H:m'); ?> hrs.</h6>
    </div>
</page>

