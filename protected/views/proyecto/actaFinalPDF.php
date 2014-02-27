<?php
/* @var $this ProyectoController */
/* @var $modelInformante EvaluacionDefensaInformante */
/* @var $model Proyecto */
/* @var $modelSala EvaluacionDefensaSala */
/* @var $modelGuia EvaluacionDefensaGuia */
/* @var $modelProyectoGuia EvaluacionProyectoGuia */
/* @var $modelProyectoGuia EvaluacionProyectoInformante */
?>
<style type="text/css">
    body{
        margin-left:100px;
        padding: 0;
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        font-size: 9pt;
        font-style: normal;
        font-weight: normal;
        font-variant: normal;
    }

    #page{
        margin-top: 5px;
        margin-bottom: 5px;
        background: white;
        border: 1px solid #C9E0ED;
    }
    div.titulo{
        padding-top:-10px;
        text-align: center;
    }
    #header{
        margin: 0;
        padding: 0;
        border-top: 3px solid #C9E0ED;
    }
    p{
        text-align: justify;
    }
    #content{
        padding: 20px;
    }

    .titulo{
        text-align: center;
    }
    .final{
        text-align: center;
    }

    #footer{
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
        <h3>Acta de Calificación Final - Actividad de Titulación</h3> 
        <h4 style="margin-top:-10px;"> Facultad de Ciencias Empresariales</h4>
        <h4 style="margin-top:-10px;"> Escuela de Ingeniería Civil Informática</h4>

    </div>
    <br />

    <div>

        <table bgcolor="#000000" width="600" border="0" cellspacing="2">
            <tr>
                <td bgcolor="#FFFFFF"><table width="548">
                        <tr>
                            <td width="90" valign="top"><b>NOMBRE ALUMNO:</b></td>
                            <td width="500"  ><?php echo $modelSala->idAlumno->nombre; ?></td>
                        </tr>
                        <tr>
                            <td valign="top"><b>RUT:</b></td>
                            <td width="500"><?php echo $modelSala->idAlumno->username; ?></td>
                        </tr>
                        <tr>
                            <td valign="top"><b>CARRERA:</b></td>
                            <td width="500">Ingeniería Civil en Informática</td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td bgcolor="#FFFFFF">&nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td bgcolor="#FFFFFF"><table width="548">
                        <tr>
                            <td width="90" valign="top">&nbsp;</td>
                            <td width="500"  >&nbsp;</td>
                        </tr>
                        <tr>
                            <td valign="top"><b>TEMA:</b></td>
                            <td width="500"><?php echo $model->idPropuesta->titulo; ?></td>
                        </tr>
                        <tr>
                            <td valign="top">&nbsp;</td>
                            <td width="500">&nbsp;</td>
                        </tr>
                    </table></td>
            </tr>
        </table>
    </div>

    <br />
    <br />
    <br />


    <table width="548" border="0" cellspacing="0" >
        <tr>
            <td style="border-top:solid 2px #000; border-left:solid 2px #000;"   width="222" valign="top"><h4 align="center">COMISIÓN</h4></td>
            <td style="border-top:solid 2px #000; border-left:solid 2px #000;" width="94" align="center" valign="top"><h4 align="center">NOTA</h4></td>
            <td style="border-top:solid 2px #000; border-left:solid 2px #000;" width="151" align="center" valign="top"><h4>PONDERACIÓN</h4></td>
            <td style="border-top:solid 2px #000; border-left:solid 2px #000; border-right:solid 2px #000;" width="111" align="center" valign="top"><h4 align="center">PUNTOS</h4></td>
        </tr>
        <tr>
            <td style="border-top:solid 2px #000; border-left:solid 2px #000;" width="222" valign="top"><h4>PROFESOR GUÍA</h4></td>
            <td style="border-top:solid 2px #000; border-left:solid 2px #000;" width="94" align="center" valign="top"><h4><strong>&nbsp;</strong><?php echo $modelProyectoGuia->obtienePromedio(); ?></h4></td>
            <td style="border-top:solid 2px #000; border-left:solid 2px #000;" width="151" align="center" valign="top"><h4><strong>36%</strong></h4></td>
            <td style="border-top:solid 2px #000; border-left:solid 2px #000; border-right:solid 2px #000;" width="111" align="center" valign="top"><h4><?php echo $modelProyectoGuia->obtienePromedioPonderado(); ?></h4></td>
        </tr>
        <tr>
            <td style="border-top:solid 2px #000; border-left:solid 2px #000;" width="222" valign="top"><h4>PROFESOR INFORMANTE</h4></td>
            <td style="border-top:solid 2px #000; border-left:solid 2px #000;" width="94" align="center" valign="top"><h4><?php echo $modelProyectoInformante->obtienePromedio(); ?></h4></td>
            <td style="border-top:solid 2px #000; border-left:solid 2px #000;" width="151" align="center" valign="top"><h4><strong>24%</strong></h4></td>
            <td style="border-top:solid 2px #000; border-left:solid 2px #000; border-right:solid 2px #000;" width="111" align="center" valign="top"><h4><?php echo $modelProyectoInformante->obtienePromedioPonderado(); ?></h4></td>
        </tr>
        <tr>
            <td style="border-top:solid 2px #000; border-left:solid 2px #000;" width="222" valign="top"><h4><strong>NOTA DEFENSA</strong></h4></td>
            <td style="border-top:solid 2px #000; border-left:solid 2px #000;" width="94" align="center" valign="top"><h4><strong>&nbsp;
                        <?php
                        $sumaDefensa = $modelGuia->obtienePromedioPonderadoPuro() + $modelInformante->obtienePromedioPonderadoPuro() + $modelSala->obtienePromedioPonderadoPuro();
                        echo round(($sumaDefensa), 2, PHP_ROUND_HALF_UP) . " / " . Utilidades::$arrayEquivalenciaNota[round(($sumaDefensa), 0, PHP_ROUND_HALF_UP)];
                        ?>
                    </strong></h4></td>
            <td style="border-top:solid 2px #000; border-left:solid 2px #000;" width="151" align="center" valign="top"><h4><strong>40%</strong></h4></td>
            <td style="border-top:solid 2px #000; border-left:solid 2px #000; border-right:solid 2px #000;" width="111" align="center" valign="top"><h4><?php echo round(($sumaDefensa * 0.4), 2, PHP_ROUND_HALF_UP) . " / " . Utilidades::$arrayEquivalenciaNota[round(($sumaDefensa * 0.4), 0, PHP_ROUND_HALF_UP)];
                        ?></h4></td>
        </tr>
        <tr>
            <td style="border-top:solid 2px #000;" width="222" valign="top"><h4>&nbsp;</h4></td>
            <td style="border-top:solid 2px #000; border-left:solid 2px #000; border-bottom:solid 2px #000;" width="246" colspan="2" align="center"  valign="top"><h4>CALIFICACIÓN FINAL</h4></td>
            <td style="border-top:solid 2px #000; border-left:solid 2px #000; border-right:solid 2px #000; border-bottom:solid 2px #000;" width="111" align="center" valign="top"> <h4>
                    <?php
                    $sumaFinal = ($modelProyectoGuia->obtienePromedioPuro() * 0.36) + ($modelProyectoInformante->obtienePromedioPuro() * 0.24) + ($sumaDefensa * 0.4);
                    echo round(($sumaFinal), 2, PHP_ROUND_HALF_UP) . " / " . Utilidades::$arrayEquivalenciaNota[round(($sumaFinal), 0, PHP_ROUND_HALF_UP)];
                    ;
                    ?>
                </h4></td>
        </tr>
    </table>
    <br />
    <br />
    <br />
    <br />
    <br />

    <table width="600" border="0">
        <tr>
            <td width="244" align="center">
                ________________________________<br/> 
                <?php echo $model->profInformante ? $model->profInformante->nombre : 'Sin Asignar'; ?><br/>
                Profesor(a) Informante
            </td>
            <td width="100">&nbsp;</td>
            <td width="250" align="center">        ________________________________<br/>
                <?php echo $model->profSala ? $model->profSala->nombre : 'Sin Asignar'; ?><br/>
                Profesor(a) Sala
            </td>
            <td width="100">&nbsp;</td>
            <td width="250" align="center">        ________________________________<br/>
                <?php echo $model->profGuia ? $model->profGuia->nombre : 'Sin Asignar'; ?><br/>
                Profesor(a) Guía
            </td>
        </tr>
    </table>

    <br/>
    <br/>
    <br/>
    <table width="600" border="0">
        <tr>
            <td width="244" align="center">________________________________<br/>
                <?php echo PeticionesWebService::obtieneNombreJefe(Yii::app()->user->getState('campus')) ?><br/>
                Jefe de Carrera/Director(a) de Escuela
            </td>
            <td width="100">&nbsp;</td>
            <td width="250" align="center">        ________________________________<br/>
                <?php echo PeticionesWebService::obtieneNombreDirectorDep(Yii::app()->user->getState('campus')) ?><br/>
                Director(a) Departamento
            </td>
        </tr>
    </table>


    <br />
    <br />
    <br />
    <br /><br />
    <br />


    <div> 
        <h6>Emitido el <?php echo date('d/m/Y H:m'); ?> hrs.</h6>
    </div>
</page>


