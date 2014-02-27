<?php

/**
 * This is the model class for table "avance".
 *
 * The followings are the available columns in table 'avance':
 * @property integer $id_avance
 * @property integer $id_planificacion
 * @property integer $id_proyecto
 * @property string $descripcion
 * @property string $fecha_creacion
 * @property integer $ruta_adjunto
 * @property integer $creador
 *
 * The followings are the available model relations:
 * @property Adjunto $rutaAdjunto
 * @property Proyecto $idProyecto
 * @property Planificacion $idPlanificacion
 * @property Usuario $creador0
 * @property Correccion[] $correccions
 */
class AgregaParticipante extends CModel {

    public $rut;
    public $id_propuesta;

    public function rules() {

        return array(
            array('id_propuesta, rut', 'required'),
        );
    }

    public function tableName() {
        return '{{UNVETTED}}';
    }

    public function attributeNames() {
        return array(
            'rut' => 'Rut',
            'id_propuesta' => 'id_propuesta'
        );
    }

}