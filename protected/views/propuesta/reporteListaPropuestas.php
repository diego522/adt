<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<style type="text/css">

    td{
        width: 45%;
    }



</style>
<page backtop="10mm" backbottom="10mm" backleft="3mm" backright="5mm" orientation="landscape">
    <div align="center">
        <h2>Listado de Temas Actividad de Titulación</h2>
        <h4>Generado el: <?php echo date('d/m/Y H:i'); ?> </h4>
    </div>

    <div align="center" > 
        <table width="300" border="1" align="center" cellpadding="1">
            <tr>
                <td>Código</td>
                <td>Título</td>
                <td>Creador</td>
                <td>Prof. Guía</td>
                <td>Integrantes</td>
                <td>Fecha envío</td>
                <td>Fecha resolución</td>
                <td>Estado</td>
            </tr>
            <?php
            foreach ($model as $miniModel) {
                ?>
                <tr>
                    <td ><?php echo $miniModel->id_propuesta; ?></td>
                    <td ><?php echo $miniModel->titulo; ?></td>
                    <td ><?php echo $miniModel->usuarioCreador->nombre; ?></td>
                    <td ><?php echo $miniModel->profesorGuia ? $miniModel->profesorGuia->nombre : ''; ?></td>

                    <td >
                        <?php
                        foreach ($miniModel->propuestaInscritas as $inscritos) {
                            echo "- " . $inscritos->usuario0->nombre . "<br/>";
                        }
                        ?>
                    </td>
                    <td ><?php echo $miniModel->fecha_presenta_propuesta; ?></td>
                    <td ><?php echo $miniModel->fecha_resolucion; ?></td>
                    <td ><?php echo $miniModel->estado0->nombre; ?></td>
                </tr>
            <?php }
            ?>
        </table>
    </div>
</page>