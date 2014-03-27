<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */
/* @var $encargado EmpresaProyecto */
?>
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

    </page_header>
    <div class="logo">
        <?php echo CHtml::image("http://arrau.chillan.ubiobio.cl/sistemaici/adt/images/escudo_ubb.png", ''); ?>
    </div>
    <br/>
    <div class="titulo"> 
        <h2>Carta de Compromiso</h2>
    </div>
    <div></div>
    <div align="right">
        En Chillán, <?php echo date('d/m/Y'); ?>
    </div>
    <div></div>
    <div></div>
    <div></div>
    <p> <?php echo $encargado->nombre_encargado; ?><b> Rut: </b><?php echo $encargado->rut; ?>
        <b>actualmente encargado de: </b><?php echo $encargado->cargo; ?>
    </p>
    <p>
        Se compromete a facilitar la información y el apoyo que sea necesario para que el (los) alumno(s) de la carrera
        de Ingeniería Civil en Informática de la Universidad del Bío-Bío:
    </p>
    <ul>
        <?php
        //lista de los alumnos
        foreach ($model->idPropuesta->propuestaInscritas as $inscritos) {
            echo "<li> " . $inscritos->usuario0->nombre . " " . $inscritos->usuario0->username . "</li>";
        }
        ?>

    </ul>
    <p>
        pueda(n) desarrollar su Memoria de Título <i><b>"<?php echo $model->idPropuesta->titulo; ?>"</b></i>. Asimismo, autorizo la publicación total o parcial
        de los resultados obtenidos.
    </p>
    <p>Esta carta de compromiso es extendida a petición de los alumnos, para ser presentada junto al anteproyecto.</p>
    <p>Sin otro particular, se despide atentamente</p>

    <br/>
    <br/>
    <br/>
    <div></div>
    <div></div>
    <div></div>
    <div align="center">
        __________________________<br/>
        <?php echo $encargado->nombre_encargado; ?><br/>
        Encargado de <?php echo $encargado->cargo; ?><br/>
    </div>

   
</page>




