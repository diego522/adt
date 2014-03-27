<h3>Registro de la carta de compromiso</h3>


<?php
if ($encargado != NULL) {
    echo CHtml::link('Modificar encargado', array('empresaProyecto/update', 'id' => $encargado->id_empresa_proyecto,), array('id' => 'inline'));
    echo "<br/>";
    echo CHtml::link( '<img align="middle" title="Obtener carta de compromiso" src="' . Yii::app()->request->baseUrl . '/images/pdf_icon.png"/>', array('cartaDeCompromiso','idp'=>$model->id_proyecto));

    ?>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $encargado,
        'attributes' => array(
            'nombre_encargado',
            'nombre_empresa',
            'cargo',
            'rut'
        ),
    ));
    ?>
    <?php
} else {
    echo CHtml::link('Agregar encargado', array('empresaProyecto/create', 'idp' => $model->id_proyecto,), array('id' => 'inline'));

    echo "<br/>No se ha asignado al encargado";
}
?>