<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
      
        array('name' => 'plan_trabajo',
            'type' => 'raw'),
        array('name' => 'justificacion',
            'type' => 'raw'),
        array('name' => 'metodologia',
            'type' => 'raw'),
        
    ),
));
?>
