<?php
/* @var $this EvaluacionDefensaInformanteController */
/* @var $model EvaluacionDefensaInformante */
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
        <h3>Evaluación Defensa Actividad de Titulación</h3>
        <h4 style="margin-top:-10px;"> Facultad de Ciencias Empresariales</h4>
        <h4 style="margin-top:-10px;"> Escuela de Ingeniería Civil Informática</h4>

    </div><br />

    <table width="548">
        <tr>
            <td valign="top"><b>Profesor:</b></td>
            <td width="500"><?php echo $model->idProyecto->profSala != NULL ? $model->idProyecto->profSala->nombre : 'Sin Asignar'; ?></td>
        </tr>
        <tr>
            <td valign="top"><b>Función:</b></td>
            <td width="500">Profesor Sala</td>
        </tr>
        <tr>
            <td width="90" valign="top"><b>Alumno:</b></td>
            <td width="500"  ><?php echo $model->idAlumno->nombre; ?></td>
        </tr>
        <tr>
            <td valign="top"><b>Título del<br>
                    Tema:</b></td>
            <td width="500"><?php echo $model->idProyecto->idPropuesta->titulo; ?></td>
        </tr>
        <tr>
            <td valign="top"><b>Fecha:</b></td>
            <td width="500"><?php echo $model->fecha_actualizacion; ?></td>
        </tr>

    </table>
    <p>A continuación Usted  encontrará una serie de afirmaciones, frente a las cuales se le solicita  indicar la calificación que, a su juicio, merece el alumno en cada uno de los  enunciados, en el rango de 1 a 10 puntos.</p>
    <br />


    <div>
        <table style="font-size:14px;" bgcolor="#000000"  border="0" cellspacing="2" width="600";>


            <tr>
                <td rowspan="5" bgcolor="#FFFFFF">&nbsp;Aspectos Generales</td>
                <td align="center" bgcolor="#FFFFFF">&nbsp;1&nbsp;</td>
              <td bgcolor="#FFFFFF">Formalidad  (lenguaje utilizado, forma de dirigirse a los asistentes,&nbsp;<br />
 presentación  personal) </td>
                <td align="center" bgcolor="#FFFFFF">&nbsp;                  <?php
                    if ($model->general_formal != NUll) {
                        echo $model->general_formal;
                    } else {
                        echo 'Sin evaluar';
                    }
                    ?>
                &nbsp;</td>
                <?php /*
                  <td bgcolor="#FFFFFF"><?php if($model->general_formal=='4'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                  <td bgcolor="#FFFFFF"><?php if($model->general_formal=='6'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                  <td bgcolor="#FFFFFF"><?php if($model->general_formal=='8'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                  <td bgcolor="#FFFFFF"><?php if($model->general_formal=='10'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                 */ ?>

            </tr>


            <tr>
                <td align="center" bgcolor="#FFFFFF">2</td>
              <td bgcolor="#FFFFFF">Seguridad  y dominio (incluye p.e.: no leer transparencias)</td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->general_seguridad != NUll) {
                        echo $model->general_seguridad;
                    } else {
                        echo 'Sin evaluar';
                    }
                    ?></td>
                <?php /*
                  <td bgcolor="#FFFFFF"><?php if($model->general_seguridad=='4'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                  <td bgcolor="#FFFFFF"><?php if($model->general_seguridad=='6'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                  <td bgcolor="#FFFFFF"><?php if($model->general_seguridad=='8'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                  <td bgcolor="#FFFFFF"><?php if($model->general_seguridad=='10'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                 */ ?>
            </tr>  

            <tr>
                <td align="center" bgcolor="#FFFFFF">3</td>
              <td bgcolor="#FFFFFF">Efectivo  uso de medios</td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->general_uso_medios != NUll) {
                        echo $model->general_uso_medios;
                    } else {
                        echo 'Sin evaluar';
                    }
                    ?></td>
                <?php /*
                  <td bgcolor="#FFFFFF"><?php if($model->general_uso_medios=='4'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                  <td bgcolor="#FFFFFF"><?php if($model->general_uso_medios=='6'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                  <td bgcolor="#FFFFFF"><?php if($model->general_uso_medios=='8'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                  <td bgcolor="#FFFFFF"><?php if($model->general_uso_medios=='10'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                 */ ?>
            </tr>  

            <tr>
                <td align="center" bgcolor="#FFFFFF">4</td>
              <td bgcolor="#FFFFFF">Planifica  la presentación en el tiempo designado</td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->general_planifica_presentacion != NUll) {
                        echo $model->general_planifica_presentacion;
                    } else {
                        echo 'Sin evaluar';
                    }
                    ?></td>
                <?php /*
                  <td bgcolor="#FFFFFF"><?php if($model->general_planifica_presentacion=='4'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                  <td bgcolor="#FFFFFF"><?php if($model->general_planifica_presentacion=='6'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                  <td bgcolor="#FFFFFF"><?php if($model->general_planifica_presentacion=='8'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                  <td bgcolor="#FFFFFF"><?php if($model->general_planifica_presentacion=='10'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                 */ ?>
            </tr>  

            <tr>
                <td align="center" bgcolor="#FFFFFF">5</td>
              <td bgcolor="#FFFFFF">Adecuada  presentación de material visual (colores, <br />
                    letras, diagramas, figuras,  ortografía y redacción)</td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->general_material_visual != NUll) {
                        echo $model->general_material_visual;
                    } else {
                        echo 'Sin evaluar';
                    }
                    ?></td>
                <?php /*
                  <td bgcolor="#FFFFFF"><?php if($model->general_material_visual=='4'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                  <td bgcolor="#FFFFFF"><?php if($model->general_material_visual=='6'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                  <td bgcolor="#FFFFFF"><?php if($model->general_material_visual=='8'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                  <td bgcolor="#FFFFFF"><?php if($model->general_material_visual=='10'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                 */ ?>
            </tr>  

            <tr>
                <td rowspan="5" bgcolor="#FFFFFF">&nbsp;Aspectos Específicos</td>
                <td align="center" bgcolor="#FFFFFF">1</td>
              <td bgcolor="#FFFFFF">Claridad  en la presentación del tema</td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->especifico_claridad != NUll) {
                        echo $model->especifico_claridad;
                    } else {
                        echo 'Sin evaluar';
                    }
                    ?></td>
                <?php /*
                  <td bgcolor="#FFFFFF"><?php if($model->especifico_claridad=='4'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                  <td bgcolor="#FFFFFF"><?php if($model->especifico_claridad=='6'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                  <td bgcolor="#FFFFFF"><?php if($model->especifico_claridad=='8'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                  <td bgcolor="#FFFFFF"><?php if($model->especifico_claridad=='10'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                 */ ?>
            </tr>  

            <tr>
                <td align="center" bgcolor="#FFFFFF">2</td>
              <td bgcolor="#FFFFFF">Destaca  aspectos relevantes de su proyecto</td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->especifico_destaca_aspectos != NUll) {
                        echo $model->especifico_destaca_aspectos;
                    } else {
                        echo 'Sin evaluar';
                    }
                    ?></td>
                <?php /*
                  <td bgcolor="#FFFFFF"><?php if($model->especifico_destaca_aspectos=='4'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                  <td bgcolor="#FFFFFF"><?php if($model->especifico_destaca_aspectos=='6'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                  <td bgcolor="#FFFFFF"><?php if($model->especifico_destaca_aspectos=='8'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                  <td bgcolor="#FFFFFF"><?php if($model->especifico_destaca_aspectos=='10'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                 */ ?>
            </tr>  

            <tr>
                <td align="center" bgcolor="#FFFFFF">3</td>
              <td bgcolor="#FFFFFF">Calidad y  claridad de las conclusiones</td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->especifico_conclusiones != NUll) {
                        echo $model->especifico_conclusiones;
                    } else {
                        echo 'Sin evaluar';
                    }
                    ?></td>
                <?php /*
                  <td bgcolor="#FFFFFF"><?php if($model->especifico_conclusiones=='4'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                  <td bgcolor="#FFFFFF"><?php if($model->especifico_conclusiones=='6'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                  <td bgcolor="#FFFFFF"><?php if($model->especifico_conclusiones=='8'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                  <td bgcolor="#FFFFFF"><?php if($model->especifico_conclusiones=='10'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                 */ ?>
            </tr>     

            <tr>
                <td align="center" bgcolor="#FFFFFF">4</td>
              <td bgcolor="#FFFFFF">Calidad y  claridad de respuestas entregadas</td>
                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->especifico_respuestas != NUll) {
                        echo $model->especifico_respuestas;
                    } else {
                        echo 'Sin evaluar';
                    }
                    ?></td>
                <?php /*
                  <td bgcolor="#FFFFFF"><?php if($model->especifico_respuestas=='4'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                  <td bgcolor="#FFFFFF"><?php if($model->especifico_respuestas=='6'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                  <td bgcolor="#FFFFFF"><?php if($model->especifico_respuestas=='8'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                  <td bgcolor="#FFFFFF"><?php if($model->especifico_respuestas=='10'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                 */ ?>
            </tr>  

            <tr>
                <td align="center" bgcolor="#FFFFFF">5</td>
              <td bgcolor="#FFFFFF">Demuestra  un desempeño acorde a su nivel profesional</td>

                <td align="center" bgcolor="#FFFFFF"><?php
                    if ($model->especifico_desempeño != NUll) {
                        echo $model->especifico_desempeño;
                    } else {
                        echo 'Sin evaluar';
                    }
                    ?></td>
                <?php /*
                  <td bgcolor="#FFFFFF"><?php if($model->especifico_desempeño=='4'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                  <td bgcolor="#FFFFFF"><?php if($model->especifico_desempeño=='6'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                  <td bgcolor="#FFFFFF"><?php if($model->especifico_desempeño=='8'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                  <td bgcolor="#FFFFFF"><?php if($model->especifico_desempeño=='10'){echo  CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo1.jpg", '',array('width'=>'15') );}else{echo CHtml::image(Yii::app()->getBaseUrl(true)."/images/circulo0.jpg", '',array('width'=>'15'));} ?></td>
                 */ ?>
            </tr>  

        </table>
    </div>

    <div>
        <br />
    La calificación final se obtiene de la siguiente forma:<br />
        NF = (<?php echo CHtml::image(Yii::app()->getBaseUrl(true) . "/images/sigma.jpg", '', array('width' => '10')); ?> puntajes obtenidos en cada enunciado) / 1.3 </div>
    <div>
        <h4>NOTA FINAL: <?php echo $model->obtienePromedio() ?></h4> 
    </div>
    
    <br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
    
<table width="600" border="0">
        <tr>
            <td width="208" align="center">&nbsp;</td>
            <td width="170">&nbsp;</td>
            <td width="208" align="center">        __________________________<br/>
                <?php echo $model->idProyecto->profSala != NULL ? $model->idProyecto->profSala->nombre : 'Sin Asignar'; ?><br/>
                Firma Evaluador</td>
        </tr>
    </table>

<br />
&nbsp;<br />
<br />
<br />
<br />
<br /><br />
<br />

    <div> 
        <h6>Emitido el <?php echo date('d/m/Y H:m'); ?> hrs.</h6>
    </div>
</page>


