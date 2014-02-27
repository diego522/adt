<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        array('name' => 'trabajos_simi',
            'type' => 'raw'),
        array('name' => 'bibliografia',
            'type' => 'raw'),
    ),
));
?>
