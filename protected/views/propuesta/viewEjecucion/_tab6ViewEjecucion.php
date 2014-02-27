<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        array('name' => 'adjunto', 'type' => 'raw', 'value' => $model->adjunto ? CHtml::link('Descargar', array('download', 'id' => $model->adjunto,)) : 'no hay adjuntos'),

    ),
));
?>
