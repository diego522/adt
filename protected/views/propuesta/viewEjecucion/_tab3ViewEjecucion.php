<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
      
        array('name' => 'objetivos',
            'type' => 'raw'),
        array('name' => 'objetivos_especificos',
            'type' => 'raw'),
        
    ),
));
?>
