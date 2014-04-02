<style type="text/css">
    body
    {
        margin: 0;
        padding: 0;
        font: normal 10pt Arial,Helvetica,sans-serif;

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
        /*background-image:url(escudo_ubb.png);*/
        padding-right:136px;
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
        <h2>UNIVERSIDAD DEL BÍO BÍO</h2>
        <h2>FACULTAD DE CIENCIAS EMPRESARIALES</h2>
    </div>

    <div >
        <h3>1.- IDENTIFICACIÓN ALUMNO(S).</h3>
    </div>
    <?php
    $propuestasInscritas = $model->propuestaInscritas;
    foreach ($propuestasInscritas as $prop) {
        $usuario = $prop->usuario0;
        ?>
        <table border="1" align="center">
            <tr><td>
                    <table>
                        <tr>
                            <td><b>NOMBRE:</b></td>
                            <td><?php echo $usuario->nombre; ?></td>
                        </tr>
                        <tr>
                            <td><b>RUT:</b></td>
                            <td><?php echo $usuario->username . "-" . $usuario->dv; ?></td>
                        </tr>
                        <tr>
                            <td><b>EMAIL:</b></td>
                            <td><?php echo $usuario->email; ?></td>
                        </tr>
                        <tr>
                            <td><b>CARRERA:</b></td>
                            <td>Ingeniería Civil en Informática</td>
                        </tr>
                        <tr>
                            <td><b>DEPTO.:</b></td>
                            <td>Ciencias de la Computación y Tecnologías de Información</td>
                        </tr>
                    </table>
                </td></tr>
        </table>
        <br/>
    <?php }
    ?>

    <div >
        <h3 >2.- TÍTULO QUE IDENTIFICARÁ A LA ACTIVIDAD DE TITULACIÓN.</h3>
        <p ><?php echo $model->titulo; ?></p>
    </div>   


    <div >
        <h3>3.- PROFESOR GUÍA.</h3>
        <p ><?php if ($model->profesorGuia != NULL) { ?>
            <table>
                <tr><td><b>NOMBRE:</b></td><td><?php echo $model->profesorGuia->nombre; ?></td></tr>
                <tr><td><b>FIRMA:</b></td><td>__________________</td></tr>
            </table>
            <?php
        } else {
            echo 'No se ha asignado';
        }
        ?>
        </p>
    </div> 

    <div >
        <h3>4.- PROFESOR CO-GUÍA.</h3>

        <p ><?php if ($model->prof_co_guia != NULL) { ?>
            <table>
                <tr><td><b>NOMBRE:</b></td><td><?php echo $model->prof_co_guia; ?></td></tr>
                <tr><td><b>FIRMA:</b></td><td>__________________</td></tr>
            </table>
            <?php
        } else {
            echo 'No se ha asignado';
        }
        ?>
        </p>
    </div> 
    <div >
        <h3> 5.- PERSONAS, INSTITUCIONES O EMPRESAS EN QUE SE SOLICITARÁ APOYO Y ASESORÍA. </h3>
        <p ><?php if ($model->nombre_empresa) { ?>

            <table>
                <tr><td><b>NOMBRE:</b></td><td><?php echo $model->nombre_empresa; ?></td></tr>
            </table>
            <?php
        } else {
            echo 'No se ha asignado';
        }
        ?>
        </p>
    </div>
    <div >
        <h3> 6.- NOMBRE DE LA PERSONA RESPONSABLE DE LA EMPRESA QUE SUPERVISARA AL ALUMNO. </h3>

        <p ><?php if ($model->nombre_responsable) { ?>
            <table>
                <tr><td><b>NOMBRE:</b></td><td><?php echo $model->nombre_responsable; ?></td></tr>
                <tr><td><b>CARGO:</b></td><td><?php echo $model->cargo_responsable; ?></td></tr>
            </table>
            <?php
        } else {
            echo 'No se ha asignado';
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
<?php
if ($model->adjunto0) {
    if (strpos($model->adjunto0->filecontenttype, 'image') !== FALSE) {
        ?>
        <page backtop="14mm" backbottom="14mm" backleft="10mm" backright="10mm" orientation="landscape">
            <div >
                <h3> Anexo </h3>
                <img src="<?php echo $model->adjunto0->ruta; ?>" style="width: 260mm;height: 150mm;"/>
            </div> 
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

<page  backtop="14mm" backbottom="14mm" backleft="10mm" backright="10mm" orientation="portrait">
    <div > 
        <h3>   LA PRESENTE SOLICITUD DE INSCRIPCIÓN DE LA ACTIVIDAD DE TITULACIÓN SIGNIFICA UN COMPROMISO DE CUMPLIR CON LO ESTUPILADO EN ELLA </h3>
    </div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div >    
        <div style="text-align: center;"> _________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_________________</div>
        <div style="text-align: center;">FIRMA ALUMNO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; FIRMA ALUMNO</div>
        <br/>
        <div></div>
        <div style="text-align: center;">FECHA DE PRESENTACIÓN DE LA SOLICITUD :<?php echo $model->fecha_presenta_propuesta ?></div>
        <br/>
        <div></div>
    </div>
    <table border="1" align="center">
        <tr><td><b>RESOLUCIÓN DE ESCUELA/JEFE DE CARRERA</b></td></tr>
        <tr>
            <td>
                <p>ESTADO: <?php echo $model->estado0->nombre; ?></p>
                <p>OBSERVACIONES: <?php echo $model->observaciones; ?></p>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div style="text-align: center;"> ___________________ </div>
                <br/>
                <div style="text-align: center;">FIRMA DIRECTOR DE ESCUELA/JEFE DE CARRERA</div>
            </td>
        </tr>
    </table>
    <p style="text-align: center;">FECHA RESOLUCIÓN: <?php echo $model->fecha_resolucion; ?></p>
    <page_footer>
        <div align="center">
            [[page_cu]]
        </div>
    </page_footer>
</page>