<?php
/**
 * @var $this ProyectoController 
 * @var $model Proyecto 
 * 
 * 
 */
?>
<h3>Planificación de defensa</h3>
<?php
if (Yii::app()->user->checkeaAccesoMasivo(array(Rol::$SUPER_USUARIO, Rol::$ADMINISTRADOR))) {
    echo CHtml::link('Planificar nueva defensa', array('defensa/create', 'idp' => $model->id_proyecto), array('id' => 'inline'));
}
?>
<h4>Listado de planificaciones</h4>


<table>
    <tr>
        <td>Fecha de Planificación</td>
    </tr>
    <?php
    $listadoDefensas = Defensa::model()->findAll('id_proyecto=' . $model->id_proyecto . " order by fecha_programacion DESC");
    foreach ($listadoDefensas as $defensa) {
        //listado de defensas
        echo "<tr>
            <td>" . CHtml::link($defensa->fecha_programacion, array('defensa/view', 'id' => $defensa->id_defensa,), array('id' => 'inline')) . "</td>" .
        "<td>" . CHtml::link(' Modificar ', array('defensa/update', 'id' => $defensa->id_defensa,), array('id' => 'inline')) . "</td>" .
       //  "<td>" . CHtml::link(' Eliminar ', array('defensa/delete', 'id' => $defensa->id_defensa,))."</td>".
        "<tr>";
    }
    ?>
</table>

<?php
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target' => 'a#inline',
    'config' => array(
        'scrolling' => 'no',
        'titleShow' => false,
    ),)
);
?>