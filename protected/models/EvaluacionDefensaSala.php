<?php

/**
 * This is the model class for table "evaluacion_defensa_sala".
 *
 * The followings are the available columns in table 'evaluacion_defensa_sala':
 * @property integer $id_evaluacion_defensa_sala
 * @property integer $id_evaluacion_defensa_sala_padre
 * @property integer $id_alumno
 * @property integer $id_proyecto
 * @property integer $id_creador
 * @property string $fecha_actualizacion
 * @property double $general_formal
 * @property double $general_seguridad
 * @property double $general_uso_medios
 * @property double $general_planifica_presentacion
 * @property double $general_material_visual
 * @property double $especifico_claridad
 * @property double $especifico_destaca_aspectos
 * @property double $especifico_conclusiones
 * @property double $especifico_respuestas
 * @property double $especifico_desempeño
 * @property integer $estado
 * @property string $comentarios
 *
 * The followings are the available model relations:
 * @property EvaluacionDefensaSala $idEvaluacionDefensaSalaPadre
 * @property EvaluacionDefensaSala[] $evaluacionDefensaSalas
 * @property Usuario $idAlumno
 * @property Proyecto $idProyecto
 * @property Proyecto $idCreador
 */
class EvaluacionDefensaSala extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return EvaluacionDefensaSala the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'evaluacion_defensa_sala';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_alumno, id_proyecto,  general_formal, general_seguridad, general_uso_medios, general_planifica_presentacion, general_material_visual, especifico_claridad, especifico_destaca_aspectos, especifico_conclusiones, especifico_respuestas, especifico_desempeño', 'required', 'on' => 'envia'),
            array('id_evaluacion_defensa_sala_padre, id_alumno, id_proyecto, id_creador', 'numerical', 'integerOnly' => true),
            array('general_formal, general_seguridad, general_uso_medios, general_planifica_presentacion, general_material_visual, especifico_claridad, especifico_destaca_aspectos, especifico_conclusiones, especifico_respuestas, especifico_desempeño', 'numerical'),
            array('comentarios,estado', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_evaluacion_defensa_sala, id_evaluacion_defensa_sala_padre, id_alumno, id_proyecto, id_creador, fecha_actualizacion, general_formal, general_seguridad, general_uso_medios, general_planifica_presentacion, general_material_visual, especifico_claridad, especifico_destaca_aspectos, especifico_conclusiones, especifico_respuestas, especifico_desempeño, comentarios', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idEvaluacionDefensaSalaPadre' => array(self::BELONGS_TO, 'EvaluacionDefensaSala', 'id_evaluacion_defensa_sala_padre'),
            'evaluacionDefensaSalas' => array(self::HAS_MANY, 'EvaluacionDefensaSala', 'id_evaluacion_defensa_sala_padre'),
            'idAlumno' => array(self::BELONGS_TO, 'Usuario', 'id_alumno'),
            'estado0' => array(self::BELONGS_TO, 'Estado', 'estado'),
            'idProyecto' => array(self::BELONGS_TO, 'Proyecto', 'id_proyecto'),
            'idCreador' => array(self::BELONGS_TO, 'Proyecto', 'id_creador'),
        );
    }

    public function obtienePromedio() {
        $suma = ((($this->especifico_claridad +
                $this->especifico_conclusiones +
                $this->especifico_desempeño +
                $this->especifico_destaca_aspectos +
                $this->especifico_respuestas) / 1) * 1.4) +
                ((($this->general_formal +
                $this->general_material_visual +
                $this->general_planifica_presentacion +
                $this->general_seguridad +
                $this->general_uso_medios) / 1) * 0.6);
        return round($suma, 2, PHP_ROUND_HALF_UP) . " / " . Utilidades::$arrayEquivalenciaNota[round($suma, 0, PHP_ROUND_HALF_UP)];
    }

    public function obtienePromedioPonderado() {
        $suma = ((($this->especifico_claridad +
                $this->especifico_conclusiones +
                $this->especifico_desempeño +
                $this->especifico_destaca_aspectos +
                $this->especifico_respuestas) / 1) * 1.4) +
                ((($this->general_formal +
                $this->general_material_visual +
                $this->general_planifica_presentacion +
                $this->general_seguridad +
                $this->general_uso_medios) / 1) * 0.6);
        return round(($suma * 0.4), 2, PHP_ROUND_HALF_UP) . " / " . Utilidades::$arrayEquivalenciaNota[round(($suma * 0.4), 0, PHP_ROUND_HALF_UP)];
    }
     public function obtienePromedioPonderadoPuro() {
        $suma = ((($this->especifico_claridad +
                $this->especifico_conclusiones +
                $this->especifico_desempeño +
                $this->especifico_destaca_aspectos +
                $this->especifico_respuestas) / 1) * 1.4) +
                
                ((($this->general_formal +
                $this->general_material_visual +
                $this->general_planifica_presentacion +
                $this->general_seguridad +
                $this->general_uso_medios) / 1) * 0.6);
        return round(($suma*0.4), 2, PHP_ROUND_HALF_UP);
    }

    public function evaluacionCompleta() {
        return $this->especifico_claridad != NULL &&
                $this->especifico_conclusiones != NULL &&
                $this->especifico_desempeño != NULL &&
                $this->especifico_destaca_aspectos != NULL &&
                $this->especifico_respuestas != NULL &&
                $this->general_formal != NULL &&
                $this->general_material_visual != NULL &&
                $this->general_planifica_presentacion != NULL &&
                $this->general_seguridad != NULL &&
                $this->general_uso_medios != NULL;
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_evaluacion_defensa_sala' => 'Id Evaluacion Defensa Guia',
            'id_evaluacion_defensa_sala_padre' => 'Id Evaluacion Defensa Guia Padre',
            'id_alumno' => 'Alumno',
            'id_proyecto' => 'Proyecto',
            'id_creador' => 'Creador',
            'fecha_actualizacion' => 'Fecha de Actualización',
            'general_formal' => 'Formalidad (lenguaje utilizado,forma de dirigirse a los asistentes,presentación personal).',
            'general_seguridad' => 'Seguridad y dominio (incluye p.e.: no leer transparencias)',
            'general_uso_medios' => 'Efectivo uso de medios',
            'general_planifica_presentacion' => 'Planifica la presentación en el tiempo designado',
            'general_material_visual' => 'Adecuada presentación de material visual (colores,letras,diagramas,figuras,ortografía y redacción)',
            'especifico_claridad' => 'Claridad en la presentación del tema',
            'especifico_destaca_aspectos' => 'Destaca aspectos relevantes de su proyecto',
            'especifico_conclusiones' => 'Calidad y claridad de las conclusiones',
            'especifico_respuestas' => 'Calidad y claridad de las respuestas entregadas',
            'especifico_desempeño' => 'Demuestra un desempeño acorde a su nivel profesional',
            'comentarios' => 'Comentarios',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id_evaluacion_defensa_sala', $this->id_evaluacion_defensa_sala);
        $criteria->compare('id_evaluacion_defensa_sala_padre', $this->id_evaluacion_defensa_sala_padre);
        $criteria->compare('id_alumno', $this->id_alumno);
        $criteria->compare('id_proyecto', $this->id_proyecto);
        $criteria->compare('id_creador', $this->id_creador);
        $criteria->compare('fecha_actualizacion', $this->fecha_actualizacion, true);
        $criteria->compare('general_formal', $this->general_formal);
        $criteria->compare('general_seguridad', $this->general_seguridad);
        $criteria->compare('general_uso_medios', $this->general_uso_medios);
        $criteria->compare('general_planifica_presentacion', $this->general_planifica_presentacion);
        $criteria->compare('general_material_visual', $this->general_material_visual);
        $criteria->compare('especifico_claridad', $this->especifico_claridad);
        $criteria->compare('especifico_destaca_aspectos', $this->especifico_destaca_aspectos);
        $criteria->compare('especifico_conclusiones', $this->especifico_conclusiones);
        $criteria->compare('especifico_respuestas', $this->especifico_respuestas);
        $criteria->compare('especifico_desempeño', $this->especifico_desempeño);
        $criteria->compare('comentarios', $this->comentarios, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array(
            'ERememberFiltersBehavior' => array(
                'class' => 'application.components.ERememberFiltersBehavior',
                'defaults' => array(), /* optional line */
                'defaultStickOnClear' => false /* optional line */
            ),
        );
    }

    public function beforeSave() {
        $this->fecha_actualizacion = new CDbExpression('NOW()');
        if ($this->isNewRecord) {
            $this->id_creador = Yii::app()->user->id;
        } else {
            $evaluacion = EvaluacionDefensaSala::model()->findByPk($this->id_evaluacion_defensa_sala);
            $newDate3 = DateTime::createFromFormat('d/m/Y', $this->fecha_actualizacion);
            if ($newDate3 != null)
                $this->fecha_actualizacion = $newDate3->format('Y-m-d');
            else
                $this->fecha_actualizacion = NULL;
            $evaluacion->id_evaluacion_defensa_sala_padre = $this->id_evaluacion_defensa_sala;
            $evaluacion->id_evaluacion_defensa_sala = null;
            $evaluacion->id_creador = Yii::app()->user->id;
            $evaluacion->isNewRecord = TRUE;
            $evaluacion->save();
        }
        return parent::beforeSave();
    }

    protected function afterFind() {
        // convert to display format
        $this->fecha_actualizacion != NULL ? $this->fecha_actualizacion = Yii::app()->dateFormatter->format("dd/MM/y", strtotime($this->fecha_actualizacion)) : '';
        parent::afterFind();
    }

}