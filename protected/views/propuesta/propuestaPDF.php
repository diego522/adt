<style type="text/css">
    body
    {
        margin-left:100px;
        padding: 0;
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        font-size: 10pt;
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
        padding-top:84px;
        background-repeat: no-repeat;
        background-position: center;
        margin-top:-60px;
        text-align:center;
    }


</style>
<page backtop="14mm" backbottom="14mm" backleft="10mm" backright="10mm">
    <page_header>
        <div>
            <p align="left"></p>
        </div>
    </page_header>
    <div class="logo">
        <?php echo CHtml::image("http://arrau.chillan.ubiobio.cl/sistemaici/adt/images/escudo_ubb.png", ''); ?>
    </div>
    <div class="titulo"> 
        <h4>FACULTAD DE CIENCIAS EMPRESARIALES</h4>
    </div>

    <div >
        <h3>1.- IDENTIFICACIÓN ALUMNO(S).</h3>
    </div>
    <?php
    $propuestasInscritas = $model->propuestaInscritas;
    foreach ($propuestasInscritas as $prop) {
        $usuario = $prop->usuario0;
        ?>
        <table width="700" border="0" align="center" cellpadding="1" bgcolor="#000000">
            <tr bgcolor="#FFFFFF"><td nowrap="nowrap">
                    <table width="100%" cellspacing="8">
                        <tr>
                            <td height="30"><h3><b>NOMBRE</b></h3></td>
                            <td><h3><b>:</b></h3></td>
                            <td height="30"><?php echo $usuario->nombre; ?></td>
                        </tr>
                        <tr>
                            <td height="30"><h3><b>RUT</b></h3></td>
                            <td><h3><b>:</b></h3></td>
                            <td height="30"><?php echo $usuario->username; ?></td>
                        </tr>
                        <tr>
                            <td height="30"><h3><b>EMAIL</b></h3></td>
                            <td><h3><b>:</b></h3></td>
                            <td height="30"><?php echo $usuario->email; ?></td>
                        </tr>
                        <tr>
                            <td height="30"><h3><b>TELÉFONO</b></h3></td>
                            <td><h3><b>:</b></h3></td>
                            <td height="30"><?php echo $usuario->telefono; ?></td>
                        </tr>
                        <tr>
                            <td height="30"><h3><b>DIRECCIÓN</b></h3></td>
                            <td><h3><b>:</b></h3></td>
                            <td height="30"><?php echo $usuario->direccion; ?></td>
                        </tr>
                        <tr>
                            <td height="30"><h3><b>CARRERA</b></h3></td>
                            <td><h3><b>:</b></h3></td>
                            <td height="30">Ingeniería Civil en Informática</td>
                        </tr>
                        <tr>
                            <td height="30"><h3><b>DEPTO.</b></h3></td>
                            <td><h3><b>:</b></h3></td>
                            <td height="30">Ciencias de la Computación y Tecnologías de Información</td>
                        </tr>
                    </table>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
        </table>
        <br/>
    <?php }
    ?>

    <div >
        <h3 >2.- TÍTULO QUE IDENTIFICARÁ A LA ACTIVIDAD DE TITULACIÓN.</h3>
        <p><?php echo $model->titulo; ?></p>
    </div>   


    <page_footer>
        <div align="center">
            [[page_cu]]
        </div>
    </page_footer>

    <div >
        <h3>3.- PROFESOR GUÍA.</h3>
        <p ><?php if ($model->profesorGuia != NULL) { ?>
            <table>
                <tr>
                    <td><b>NOMBRE</b></td>
                    <td>:</td>
                    <td><?php echo $model->profesorGuia->nombre; ?></td>
                </tr>
                <tr><td><h3>&nbsp;</h3></td>
                    <td><h3>&nbsp;</h3></td>
                    <td>&nbsp;</td></tr>
                <tr><td><b>FIRMA</b></td>
                    <td>:</td>
                    <td>__________________</td></tr>
            </table>
            <?php
        } else {
            //echo 'No contempla';
        }
        ?>
        </p>
    </div> 

    <div >
        <h3>4.- PROFESOR CO-GUÍA.</h3>

        <p ><?php if ($model->prof_co_guia != NULL) { ?>
            <table>
                <tr>
                    <td><b>NOMBRE</b></td>
                    <td>:</td>
                    <td><?php echo $model->prof_co_guia; ?></td>
                </tr>
                <tr><td><h3>&nbsp;</h3></td>
                    <td><h3>&nbsp;</h3></td>
                    <td>&nbsp;</td></tr>
                <tr><td><b>FIRMA</b></td>
                    <td>:</td>
                    <td>__________________</td></tr>
            </table>
            <?php
        } else {
            //echo 'No contempla';
        }
        ?>
        </p>
    </div> 
    <div >
        <h3> 5.- PERSONAS, INSTITUCIONES O EMPRESAS EN QUE SE SOLICITARÁ APOYO Y ASESORÍA. </h3>
        <p ><?php if ($model->nombre_empresa) { ?>

            <table>
                <tr><td><b>NOMBRE</b></td>
                    <td>:</td>
                    <td><?php echo $model->nombre_empresa; ?></td></tr>
            </table>
            <?php
        } else {
            // echo 'No contempla';
        }
        ?>
        </p>
    </div>
    <div >
        <h3> 6.- NOMBRE DE LA PERSONA RESPONSABLE DE LA EMPRESA QUE SUPERVISARA AL ALUMNO. </h3>

        <p ><?php if ($model->nombre_responsable) { ?>
            <table>
                <tr><td><b>NOMBRE</b></td>
                    <td>:</td>
                    <td><?php echo $model->nombre_responsable; ?></td></tr>
                <tr>
                    <td><h3>&nbsp;</h3></td>
                    <td><h3>&nbsp;</h3></td>
                    <td>&nbsp;</td></tr>

                <tr><td><b>CARGO</b></td>
                    <td>:</td>
                    <td><?php echo $model->cargo_responsable; ?></td></tr>
            </table>
            <?php
        } else {
            //echo 'No contempla';
        }
        ?>
        </p>
    </div>
    <page_footer>
        <div align="center">
            [[page_cu]]
        </div>
    </page_footer>
</page>



<page pageset="old">
    <div >
        <h3>7.- OBJETIVOS GENERALES Y ESPECÍFICO DE LA ACTIVIDAD DE TITULACIÓN.</h3>
    </div> 
    <div >
        <h4>OBJETIVO GENERAL.</h4>
        <p ><?php echo $model->objetivos; ?></p> 
    </div> 
    <div >
        <h4>OBJETIVOS ESPECÍFICOS.</h4>
        <p ><?php echo $model->objetivos_especificos; ?></p> 
    </div> 
</page>
<page pageset="old">
    <div >
        <h3>8.- JUSTIFICACIÓN DEL PROYECTO PROPUESTO.</h3>
        <p ><?php echo $model->justificacion; ?></p>
    </div> 
</page>
<page pageset="old">
    <div >
        <h3>9.- PLAN DE TRABAJO.</h3>
        <p ><?php echo $model->plan_trabajo; ?></p>
    </div> 
</page>
<page pageset="old">
    <div >
        <h3>10.- DESCRIPCIÓN DE LOS ASPECTOS FUNDAMENTALES DE LA METODOLOGÍA A UTILIZAR. </h3>
        <p ><?php echo $model->metodologia; ?></p>
    </div> 
</page>
<page pageset="old">
    <div >
        <h3>11.- TRABAJOS SIMILARES REALIZADOS PREVIAMENTE. </h3>
        <p ><?php echo $model->trabajos_simi; ?></p>
    </div> 
    <div >
        <h3>12.- BIBLIOGRAFÍA A UTILIZAR. </h3>
        <p ><?php echo $model->bibliografia; ?></p>
    </div> 
</page>


<page  backtop="14mm" backbottom="14mm" backleft="10mm" backright="10mm" orientation="portrait">
    <div > 
        <h3>   LA PRESENTE SOLICITUD DE INSCRIPCIÓN DE LA ACTIVIDAD DE TITULACIÓN SIGNIFICA UN COMPROMISO DE CUMPLIR CON LO ESTIPULADO EN ELLA </h3>
    </div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div >    
        <div style="text-align: center;"> _______________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_______________________</div>
        <div style="text-align: center;"><strong>FIRMA ALUMNO</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>FIRMA ALUMNO</strong></div>


        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <div ><strong>FECHA DE PRESENTACIÓN DE LA SOLICITUD:</strong><?php echo $model->fecha_presenta_propuesta ?></div>
        <br/>
        <div></div>
    </div>
    <p> </p>

    <p></p>


    <table width="70%" border="0" align="center" cellpadding="12" cellspacing="2" bgcolor="#000000">
        <tr>
            <td height="30" align="center" bgcolor="#FFFFFF"><b>RESOLUCIÓN DE ESCUELA/JEFE DE CARRERA</b></td>
        </tr>
        <tr>
            <td bgcolor="#FFFFFF">                <p><strong>ESTADO:</strong> <?php echo $model->estado0->nombre; ?></p>
                <p><strong>OBSERVACIONES:</strong> <span ><?php echo $model->observaciones; ?></span></p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <div style="text-align: center; width:500px; padding-left:180px"> ______________________________</div>
                <div style="text-align: center; width:500px; padding-left:180px"><strong>FIRMA DIRECTOR DE ESCUELA<br />
                        /JEFE DE CARRERA</strong></div><p>&nbsp;</p>
                <p><strong>FECHA RESOLUCIÓN:</strong> <?php echo $model->fecha_resolucion; ?></p></td>
        </tr>
    </table>
    <page_footer>
        <div align="center">
            [[page_cu]]
        </div>
    </page_footer>
</page>

<?php
if ($model->adjunto0) {
    if (strpos($model->adjunto0->filecontenttype, 'image') !== FALSE || strpos($model->adjunto0->filecontenttype, 'pdf') !== FALSE) {
        ?>
        <page backtop="14mm" backbottom="14mm" backleft="10mm" backright="10mm">
            <div >
                <h1> Anexo </h1>
            </div> 
        </page>
    <?php } ?>
    <?php if (strpos($model->adjunto0->filecontenttype, 'image') !== FALSE) { ?>
        <page backtop="14mm" backbottom="14mm" backleft="5mm" backright="5mm" orientation="landscape">
            <img src="<?php echo $model->adjunto0->ruta; ?>" style="width: 275mm;height: 150mm;"/>

            <page_footer>
                <div align="center">
                    [[page_cu]]
                </div>
            </page_footer>
        </page>
        <?php
    }
}
?>
