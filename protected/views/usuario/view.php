<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs = array(
    'Usuarios' => array('admin'),
    'Detalle del usuario',
);

?>

<h1>Detalle de Usuario </h1>

<p>Para actualizar sus datos debe hacerlo desde el sistema principal.</p>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        //'id_usuario',
        'nombre',
        'username',
        //'dv',
        //'password',
        //'apellido',
        array('name' => 'id_rol',
            'value' => $model->idRol->nombre),
        'email',
        'direccion',
        'telefono',
        array('name' => 'campus',
            'value' => $model->campus ? $model->campus == '1' ? 'Concepción' : 'Chillán' : '')
    ),
));
?>
