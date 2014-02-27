<h3>Profesores responsables</h3>
<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        array('name' => 'prof_guia',
            'value' => $model->profGuia ? $model->profGuia->nombre : ''),
        array('name' => 'prof_informante',
            'value' => $model->profInformante ? $model->profInformante->nombre : ''),
        array('name' => 'prof_sala',
            'value' => $model->profSala ? $model->profSala->nombre : ''),
    ),
));
?>