<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $tablaCambios,
    'attributes' => array(                
        array('name' => 'Cambios',
            'type' => 'raw',
            'value'=>$tablaCambios,
            /*'visible' => $model->observaciones ? true : false*/),
    ),
));
?>