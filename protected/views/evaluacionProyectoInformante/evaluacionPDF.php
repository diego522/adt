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

<page backtop="2mm" backbottom="2mm" backleft="20mm" backright="20mm">
    <div class="logo">
        <?php echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/escudo_ubb.png", ''); ?>
    </div>
    <div class="titulo">
        <h3>Evaluación Actividad de Titulación - Profesor Informante</h3>
        <h4 style="margin-top:-10px;"> Facultad de Ciencias Empresariales</h4>
        <h4 style="margin-top:-10px;"> Escuela de Ingeniería Civil Informática</h4>

    </div>
    <br />
    <table width="548">
        <tr>
            <td width="90" valign="top"><b>Título:</b></td>
            <td width="500"  ><?php echo $model->idProyecto->idPropuesta->titulo; ?></td>
        </tr>
        <tr>
            <td valign="top"><b>Profesor:</b></td>
            <td width="500"><?php echo $model->idProyecto->profInformante != NULL ? $model->idProyecto->profInformante->nombre : 'Sin Asignar'; ?></td>
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
    <p>
        A continuación Usted encontrará una serie de afirmaciones, frente a las cuales se le solicita
        encerrar en un círculo la calificación que, a su juicio, merece el alumno en cada uno de los
        enunciados de acuerdo a las siguientes categorías:
    </p>
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

                <td align="center" bgcolor="#FFFFFF" title="Definitivamente no"><strong>&nbsp;2&nbsp;</strong></td>
                <td align="center" bgcolor="#FFFFFF" title="En escasa medida"><strong>&nbsp;4&nbsp;</strong></td>
                <td align="center" bgcolor="#FFFFFF" title="Moderadamente"><strong>&nbsp;6&nbsp;</strong></td>
                <td align="center" bgcolor="#FFFFFF" title="En gran medida"><strong>&nbsp;8&nbsp;</strong></td>
                <td align="center" bgcolor="#FFFFFF" title="Definitivamente si"><strong>&nbsp;10&nbsp;</strong></td>
            </tr>  

            <tr>
                <td rowspan="9" bgcolor="#FFFFFF">&nbsp;Informe</td>
                <td align="center" bgcolor="#FFFFFF">&nbsp;1&nbsp;</td>
              <td bgcolor="#FFFFFF">El informe destaca lo importante del tema</td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_destaca_importante == '2') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>

                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_destaca_importante == '4') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_destaca_importante == '6') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_destaca_importante == '8') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_destaca_importante == '10') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
            </tr>

            <tr>
                <td align="center" bgcolor="#FFFFFF">2</td>
              <td bgcolor="#FFFFFF">El  informe expone claramente el tema</td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_expone_claro == '2') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_expone_claro == '4') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_expone_claro == '6') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_expone_claro == '8') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_expone_claro == '10') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>

            </tr>  

            <tr>
                <td align="center" bgcolor="#FFFFFF">3</td>
              <td bgcolor="#FFFFFF">El  informe se encuentra bien estructurado</td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_bien_estructurado == '2') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_bien_estructurado == '4') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_bien_estructurado == '6') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_bien_estructurado == '8') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_bien_estructurado == '10') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>

            </tr>  

            <tr>
                <td align="center" bgcolor="#FFFFFF">4</td>
              <td bgcolor="#FFFFFF">Se ha  realizado una adecuada revisión bibliográfica</td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_adecuada_bibliografia == '2') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_adecuada_bibliografia == '4') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_adecuada_bibliografia == '6') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_adecuada_bibliografia == '8') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_adecuada_bibliografia == '10') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>

            </tr>  

            <tr>
                <td align="center" bgcolor="#FFFFFF">5</td>
              <td bgcolor="#FFFFFF">Plantea  opiniones propias </td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_opiniones_propias == '2') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_opiniones_propias == '4') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_opiniones_propias == '6') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_opiniones_propias == '8') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_opiniones_propias == '10') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>

            </tr>  

            <tr>
                <td align="center" bgcolor="#FFFFFF">6</td>
              <td bgcolor="#FFFFFF">Realiza  aportes personales</td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_aportes_personales == '2') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_aportes_personales == '4') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_aportes_personales == '6') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_aportes_personales == '8') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_aportes_personales == '10') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
            </tr>  

            <tr>
                <td align="center" bgcolor="#FFFFFF">7</td>
              <td bgcolor="#FFFFFF">Demuestra  dominio de conceptos</td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_domina_conceptos == '2') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_domina_conceptos == '4') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_domina_conceptos == '6') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_domina_conceptos == '8') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_domina_conceptos == '10') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
            </tr>  

            <tr>
                <td align="center" bgcolor="#FFFFFF">8</td>
              <td bgcolor="#FFFFFF">Demuestra  dominio de técnicas</td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_domina_tecnicas == '2') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_domina_tecnicas == '4') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_domina_tecnicas == '6') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_domina_tecnicas == '8') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_domina_tecnicas == '10') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
            </tr>     

            <tr>
                <td align="center" bgcolor="#FFFFFF">9</td>
          <td bgcolor="#FFFFFF"><table border="0" cellspacing="0" cellpadding="0" width="663">
                        <tr>
                            <td width="390" valign="top">Cumple con los objetivos planteados al inicio del proyecto</td>
                        </tr>
                    </table></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_cumple_objetivo == '2') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_cumple_objetivo == '4') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_cumple_objetivo == '6') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_cumple_objetivo == '8') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->informe_cumple_objetivo == '10') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
            </tr>  

            <tr>
                <td rowspan="5" bgcolor="#FFFFFF">&nbsp;Producto&nbsp;</td>
                <td align="center" bgcolor="#FFFFFF">&nbsp;10&nbsp;</td>
              <td bgcolor="#FFFFFF">Se ajusta a los requerimientos iniciales</td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->producto_ajusta_requerimientos == '2') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->producto_ajusta_requerimientos == '4') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->producto_ajusta_requerimientos == '6') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->producto_ajusta_requerimientos == '8') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->producto_ajusta_requerimientos == '10') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
            </tr>  

            <tr>
                <td align="center" bgcolor="#FFFFFF">11</td>
              <td bgcolor="#FFFFFF">Interfaz adecuada</td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->producto_interfaz_adecuada == '2') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->producto_interfaz_adecuada == '4') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->producto_interfaz_adecuada == '6') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->producto_interfaz_adecuada == '8') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->producto_interfaz_adecuada == '10') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
            </tr>  

            <tr>
                <td align="center" bgcolor="#FFFFFF">12</td>
              <td bgcolor="#FFFFFF">Robustez</td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->producto_robustez == '2') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->producto_robustez == '4') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->producto_robustez == '6') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->producto_robustez == '8') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->producto_robustez == '10') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
            </tr>  

            <tr>
                <td align="center" bgcolor="#FFFFFF">13</td>
              <td bgcolor="#FFFFFF">Documentación completa incorporada al informe</td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->producto_documentacion == '2') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->producto_documentacion == '4') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->producto_documentacion == '6') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->producto_documentacion == '8') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->producto_documentacion == '10') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
            </tr>
            <tr>
                <td align="center" bgcolor="#FFFFFF">14</td>
              <td bgcolor="#FFFFFF">Especifica  proceso de desarrollo de software</td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->producto_especifica_proceso == '2') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->producto_especifica_proceso == '4') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->producto_especifica_proceso == '6') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->producto_especifica_proceso == '8') {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo1.jpg", '', array('width' => '15'));
                    } else {
                        echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/circulo0.jpg", '', array('width' => '15'));
                    }
                    ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php
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
        NF = (<?php echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/sigma.jpg", '', array('width' => '10')); ?> puntajes obtenidos en cada enunciado) / 1.4 </div>
    <div>
        <h4>NOTA FINAL: <?php echo $model->obtienePromedio() ?></h4> 
    </div>
    <br />
    <br />
    <br />
<br />
<br />

    <table width="530" border="0">
        <tr>
            <td width="244" align="center">__________________________<br/>
<?php echo PeticionesWebService::obtieneNombreJefe(Yii::app()->user->getState('campus')) ?><br/>
                Jefe de Carrera/Director(a) de Escuela</td>
          <td width="160">&nbsp;</td>
            <td width="208" align="center">        __________________________<br/>
<?php echo $model->idProyecto->profInformante != NULL ? $model->idProyecto->profInformante->nombre : 'Sin Asignar'; ?><br/>
                Profesor(a) Informante</td>
        </tr>
    </table>
<br />
&nbsp;<br />
<br />

    <div> 
      <h6>Emitido el <?php echo date('d/m/Y H:m'); ?> hrs.</h6>
    </div>
</page>


