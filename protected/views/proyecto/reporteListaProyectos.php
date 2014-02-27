<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<style type="text/css">

    td{
        width: 30%;
    }



</style>
<page backtop="10mm" backbottom="10mm" backleft="2mm" backright="7mm" orientation="landscape">
    <div align="center">
        <h2>Listado de Proyectos Actividad de Titulación</h2>
        <h4>Generado el: <?php echo date('d/m/Y H:i'); ?> </h4>
    </div>

    <div align="center" > 
        <table width="300" border="1" align="center" cellpadding="1">
            <tr>
                <td >Código</td>
                <td>Título</td>
                <td>Integrantes</td>
                <td>Diseñador</td>
                <td>Carta compr.</td>
                <td>Prof. Guía</td>
                <td>Prof. Infor.</td>
                <td>Prof. Sala</td>
                <td>Fecha inicio</td>
                <td>Fecha fin</td>
                <td>Etapa</td>
                <td>Estado</td>

            </tr>
            <?php
            foreach ($model as $miniModel) {
                ?>
                <tr>
                    <td ><?php echo $miniModel->id_proyecto; ?></td>
                    <td ><?php echo $miniModel->idPropuesta->titulo; ?></td>

                    <td >
                        <?php
                        foreach ($miniModel->idPropuesta->propuestaInscritas as $inscritos) {
                            echo "- " . $inscritos->usuario0->nombre . "<br/>";
                        }
                        ?>
                    </td>

                    <td ><?php echo $miniModel->apoyo_disenador == '1' ? 'SI' : 'NO'; ?></td>
                    <td ><?php echo $miniModel->carta_compromiso == '1' ? 'SI' : 'NO'; ?></td>
                    <td ><?php echo $miniModel->profGuia->nombre; ?></td>
                    <td ><?php echo $miniModel->profInformante ? $miniModel->profInformante->nombre : ''; ?></td>
                    <td ><?php echo $miniModel->profSala ? $miniModel->profSala->nombre : ''; ?></td>
                    <td ><?php echo $miniModel->fecha_inicio; ?></td>
                    <td ><?php echo $miniModel->fecha_fin; ?></td>
                    <td ><?php echo $miniModel->estadoAvance->nombre; ?></td>
                    <td ><?php echo $miniModel->estadoActual->nombre; ?></td>
                </tr>
            <?php }
            ?>
        </table>
    </div>
</page>