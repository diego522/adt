<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        
        'nombre_empresa',
        'nombre_responsable',
        'cargo_responsable',
        
    ),
));
?>
