<?php
/* @var $this CorreccionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Proyecto' => array('proyecto/view', 'id' => $idp),
    'Avance' => array('avance/view', 'id' => $ida),
    'Lista de correcciones',
);

$this->menu = array(
    array('label' => 'Agregar Corrección', 'url' => array('correccion/createDesdeAvance', 'idp' => $idp, 'ida' => $ida)),
 );
?>

<h1>Lista de correcciones</h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
