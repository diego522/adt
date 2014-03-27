<?php

/**
 * This is the model class for table "evaluacion_proyecto_informante".
 *
 * The followings are the available columns in table 'evaluacion_proyecto_informante':
 * @property integer $id_evaluacion_proyecto_informante
 * @property integer $id_evaluacion_proyecto_informante_padre
 * @property integer $id_proyecto
 * @property integer $id_alumno
 * @property integer $id_creador
 * @property string $fecha_actualizacion
 * @property double $informe_destaca_importante
 * @property double $informe_expone_claro
 * @property double $informe_bien_estructurado
 * @property double $informe_adecuada_bibliografia
 * @property double $informe_opiniones_propias
 * @property double $informe_aportes_personales
 * @property double $informe_domina_conceptos
 * @property double $informe_domina_tecnicas
 * @property double $informe_cumple_objetivo
 * @property double $producto_ajusta_requerimientos
 * @property double $producto_interfaz_adecuada
 * @property double $producto_robustez
 * @property double $producto_documentacion
 * @property double $producto_especifica_proceso
 * @property integer $estado
 * @property string $comentarios
 *
 * The followings are the available model relations:
 * @property EvaluacionProyectoInformante $idEvaluacionProyectoInformantePadre
 * @property EvaluacionProyectoInformante[] $evaluacionProyectoInformantes
 * @property Proyecto $idProyecto
 * @property Usuario $idAlumno
 * @property Usuario $idCreador
 */
class EvaluacionProyectoInformante extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return EvaluacionProyectoInformante the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'evaluacion_proyecto_informante';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_proyecto, id_alumno, informe_destaca_importante, informe_expone_claro, informe_bien_estructurado, informe_adecuada_bibliografia, informe_opiniones_propias, informe_aportes_personales, informe_domina_conceptos, informe_domina_tecnicas, informe_cumple_objetivo, producto_ajusta_requerimientos, producto_interfaz_adecuada, producto_robustez, producto_documentacion, producto_especifica_proceso', 'required', 'on' => 'envia'),
            array('id_evaluacion_proyecto_informante_padre, id_proyecto, id_alumno, id_creador', 'numerical', 'integerOnly' => true),
            array('informe_destaca_importante, informe_expone_claro, informe_bien_estructurado, informe_adecuada_bibliografia, informe_opiniones_propias, informe_aportes_personales, informe_domina_conceptos, informe_domina_tecnicas, informe_cumple_objetivo, producto_ajusta_requerimientos, producto_interfaz_adecuada, producto_robustez, producto_documentacion, producto_especifica_proceso', 'numerical'),
            array('comentarios, id_creador, fecha_actualizacion,estado', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_evaluacion_proyecto_informante, id_evaluacion_proyecto_informante_padre, id_proyecto, id_alumno, id_creador, fecha_actualizacion, informe_destaca_importante, informe_expone_claro, informe_bien_estructurado, informe_adecuada_bibliografia, informe_opiniones_propias, informe_aportes_personales, informe_domina_conceptos, informe_domina_tecnicas, informe_cumple_objetivo, producto_ajusta_requerimientos, producto_interfaz_adecuada, producto_robustez, producto_documentacion, producto_especifica_proceso, comentarios', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idEvaluacionProyectoInformantePadre' => array(self::BELONGS_TO, 'EvaluacionProyectoInformante', 'id_evaluacion_proyecto_informante_padre'),
            'evaluacionProyectoInformantes' => array(self::HAS_MANY, 'EvaluacionProyectoInformante', 'id_evaluacion_proyecto_informante_padre'),
            'idProyecto' => array(self::BELONGS_TO, 'Proyecto', 'id_proyecto'),
            'idAlumno' => array(self::BELONGS_TO, 'Usuario', 'id_alumno'),
            'estado0' => array(self::BELONGS_TO, 'Estado', 'estado'),
            'idCreador' => array(self::BELONGS_TO, 'Usuario', 'id_creador'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_evaluacion_proyecto_informante' => 'Id Evaluacion Proyecto Informante',
            'id_evaluacion_proyecto_informante_padre' => 'Id Evaluacion Proyecto Informante Padre',
            'id_proyecto' => 'Proyecto',
            'id_alumno' => 'Alumno',
            'id_creador' => 'Creador',
            'fecha_actualizacion' => 'Fecha de Actualización',
            'informe_destaca_importante' => 'El informe destaca lo importante del tema',
            'informe_expone_claro' => 'El informe expone claramente el tema',
            'informe_bien_estructurado' => 'El informe se encentra bien estructurado',
            'informe_adecuada_bibliografia' => 'Se ha realizado una adecuada revisión bibliográfica',
            'informe_opiniones_propias' => 'Plantea opiniones propias',
            'informe_aportes_personales' => 'Realiza aportes personales',
            'informe_domina_conceptos' => 'Demuestra dominio de conceptos',
            'informe_domina_tecnicas' => 'Demuestra dominio de técnicas',
            'informe_cumple_objetivo' => 'Cumple con los objetivos plantados al inicio del proyecto',
            'producto_ajusta_requerimientos' => 'Se ajusta a los requerimientos iniciales',
            'producto_interfaz_adecuada' => 'Interfaz adecuada',
            'producto_robustez' => 'Robustez',
            'producto_documentacion' => 'Documentación completa incorporada al informe',
            'producto_especifica_proceso' => 'Especifica proceso de desarrollo de software',
            'comentarios' => 'Comentarios',
        );
    }

    public function obtienePromedio() {
        $suma = (($this->informe_adecuada_bibliografia +
                $this->informe_aportes_personales +
                $this->informe_bien_estructurado +
                $this->informe_cumple_objetivo +
                $this->informe_destaca_importante +
                $this->informe_domina_conceptos +
                $this->informe_domina_tecnicas +
                $this->informe_expone_claro +
                $this->informe_opiniones_propias +
                $this->producto_ajusta_requerimientos +
                $this->producto_documentacion +
                $this->producto_especifica_proceso +
                $this->producto_interfaz_adecuada +
                $this->producto_robustez) / 1) / 1.4;
        return round($suma, 2, PHP_ROUND_HALF_UP) . " / " . Utilidades::$arrayEquivalenciaNota[round($suma, 0, PHP_ROUND_HALF_UP)];
    }
    public function obtienePromedioPuro() {
        $suma = (($this->informe_adecuada_bibliografia +
                $this->informe_aportes_personales +
                $this->informe_bien_estructurado +
                $this->informe_cumple_objetivo +
                $this->informe_destaca_importante +
                $this->informe_domina_conceptos +
                $this->informe_domina_tecnicas +
                $this->informe_expone_claro +
                $this->informe_opiniones_propias +
                $this->producto_ajusta_requerimientos +
                $this->producto_documentacion +
                $this->producto_especifica_proceso +
                $this->producto_interfaz_adecuada +
                $this->producto_robustez) / 1) / 1.4;
        return round($suma, 2, PHP_ROUND_HALF_UP) ;
    }

    public function obtienePromedioPonderado() {
        $suma = (($this->informe_adecuada_bibliografia +
                $this->informe_aportes_personales +
                $this->informe_bien_estructurado +
                $this->informe_cumple_objetivo +
                $this->informe_destaca_importante +
                $this->informe_domina_conceptos +
                $this->informe_domina_tecnicas +
                $this->informe_expone_claro +
                $this->informe_opiniones_propias +
                $this->producto_ajusta_requerimientos +
                $this->producto_documentacion +
                $this->producto_especifica_proceso +
                $this->producto_interfaz_adecuada +
                $this->producto_robustez) / 1) / 1.4;
        return round(($suma * 0.24), 2, PHP_ROUND_HALF_UP) . " / " . Utilidades::$arrayEquivalenciaNota[round(($suma * 0.24), 0, PHP_ROUND_HALF_UP)];
    }

    public function evaluacionCompleta() {
        return $this->informe_adecuada_bibliografia != NULL &&
                $this->informe_aportes_personales != NULL &&
                $this->informe_bien_estructurado != NULL &&
                $this->informe_cumple_objetivo != NULL &&
                $this->informe_destaca_importante != NULL &&
                $this->informe_domina_conceptos != NULL &&
                $this->informe_domina_tecnicas != NULL &&
                $this->informe_expone_claro != NULL &&
                $this->informe_opiniones_propias != NULL &&
                $this->producto_ajusta_requerimientos != NULL &&
                $this->producto_documentacion != NULL &&
                $this->producto_especifica_proceso != NULL &&
                $this->producto_interfaz_adecuada != NULL &&
                $this->producto_robustez != NULL;
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id_evaluacion_proyecto_informante', $this->id_evaluacion_proyecto_informante);
        $criteria->compare('id_evaluacion_proyecto_informante_padre', $this->id_evaluacion_proyecto_informante_padre);
        $criteria->compare('id_proyecto', $this->id_proyecto);
        $criteria->compare('id_alumno', $this->id_alumno);
        $criteria->compare('id_creador', $this->id_creador);
        $criteria->compare('fecha_actualizacion', $this->fecha_actualizacion, true);
        $criteria->compare('informe_destaca_importante', $this->informe_destaca_importante);
        $criteria->compare('informe_expone_claro', $this->informe_expone_claro);
        $criteria->compare('informe_bien_estructurado', $this->informe_bien_estructurado);
        $criteria->compare('informe_adecuada_bibliografia', $this->informe_adecuada_bibliografia);
        $criteria->compare('informe_opiniones_propias', $this->informe_opiniones_propias);
        $criteria->compare('informe_aportes_personales', $this->informe_aportes_personales);
        $criteria->compare('informe_domina_conceptos', $this->informe_domina_conceptos);
        $criteria->compare('informe_domina_tecnicas', $this->informe_domina_tecnicas);
        $criteria->compare('informe_cumple_objetivo', $this->informe_cumple_objetivo);
        $criteria->compare('producto_ajusta_requerimientos', $this->producto_ajusta_requerimientos);
        $criteria->compare('producto_interfaz_adecuada', $this->producto_interfaz_adecuada);
        $criteria->compare('producto_robustez', $this->producto_robustez);
        $criteria->compare('producto_documentacion', $this->producto_documentacion);
        $criteria->compare('producto_especifica_proceso', $this->producto_especifica_proceso);
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
            $evaluacion = EvaluacionProyectoInformante::model()->findByPk($this->id_evaluacion_proyecto_informante);
            $newDate3 = DateTime::createFromFormat('d/m/Y', $this->fecha_actualizacion);
            if ($newDate3 != null)
                $this->fecha_actualizacion = $newDate3->format('Y-m-d');
            else
                $this->fecha_actualizacion = NULL;
            $evaluacion->id_evaluacion_proyecto_informante_padre = $this->id_evaluacion_proyecto_informante;
            $evaluacion->id_evaluacion_proyecto_informante = null;
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