<?php

/**
 * This is the model class for table "evaluacion_proyecto_guia".
 *
 * The followings are the available columns in table 'evaluacion_proyecto_guia':
 * @property integer $id_evaluacion_proyecto_guia
 * @property integer $id_evaluacion_proyecto_guia_padre
 * @property integer $id_proyecto
 * @property integer $id_alumno
 * @property integer $id_creador
 * @property string $fecha_actualizacion
 * @property integer $desarrollo_cumple_plazo
 * @property integer $desarrollo_manifiesta_iniciativa
 * @property integer $desarrollo_desarrolla_conocimiento
 * @property integer $informe_destaca_importante
 * @property integer $informe_expone_claramente
 * @property integer $informe_bien_estructurado
 * @property integer $informe_adecuada_bibliografia
 * @property integer $informe_plantea_opinion
 * @property integer $producto_ajusta_requerimiento
 * @property integer $producto_interfaz_adecuada
 * @property integer $producto_robustez
 * @property integer $producto_documentacion_completa
 * @property integer $producto_especifica_proceso
 * @property integer $cumple_objetivo
 * @property integer $estado
 * @property string $comentarios
 *
 * The followings are the available model relations:
 * @property EvaluacionProyectoGuia $idEvaluacionProyectoGuiaPadre
 * @property EvaluacionProyectoGuia[] $evaluacionProyectoGuias
 * @property Proyecto $idProyecto
 * @property Usuario $idAlumno
 * @property Usuario $idCreador
 */
class EvaluacionProyectoGuia extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return EvaluacionProyectoGuia the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'evaluacion_proyecto_guia';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_proyecto, id_alumno, cumple_objetivo,
                desarrollo_cumple_plazo, 
                desarrollo_manifiesta_iniciativa,
                desarrollo_desarrolla_conocimiento,
                informe_destaca_importante, 
                informe_expone_claramente,
                informe_bien_estructurado,
                informe_adecuada_bibliografia,
                informe_plantea_opinion, 
                producto_ajusta_requerimiento, 
                producto_interfaz_adecuada,
                producto_robustez, 
                producto_documentacion_completa, 
                producto_especifica_proceso', 'required', 'on' => 'envia'),
            array('id_evaluacion_proyecto_guia_padre, id_proyecto, id_alumno, id_creador', 'numerical', 'integerOnly' => true),
            array('desarrollo_cumple_plazo, cumple_objetivo,desarrollo_manifiesta_iniciativa, desarrollo_desarrolla_conocimiento, informe_destaca_importante, informe_expone_claramente, informe_bien_estructurado, informe_adecuada_bibliografia, informe_plantea_opinion, producto_ajusta_requerimiento, producto_interfaz_adecuada, producto_robustez, producto_documentacion_completa, producto_especifica_proceso', 'numerical'),
            array('comentarios,cumple_objetivo,estado', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_evaluacion_proyecto_guia, id_evaluacion_proyecto_guia_padre, id_proyecto, id_alumno, id_creador, fecha_actualizacion, desarrollo_cumple_plazo, desarrollo_manifiesta_iniciativa, desarrollo_desarrolla_conocimiento, informe_destaca_importante, informe_expone_claramente, informe_bien_estructurado, informe_adecuada_bibliografia, informe_plantea_opinion, producto_ajusta_requerimiento, producto_interfaz_adecuada, producto_robustez, producto_documentacion_completa, producto_especifica_proceso, comentarios', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idEvaluacionProyectoGuiaPadre' => array(self::BELONGS_TO, 'EvaluacionProyectoGuia', 'id_evaluacion_proyecto_guia_padre'),
            'evaluacionProyectoGuias' => array(self::HAS_MANY, 'EvaluacionProyectoGuia', 'id_evaluacion_proyecto_guia_padre'),
            'idProyecto' => array(self::BELONGS_TO, 'Proyecto', 'id_proyecto'),
            'estado0' => array(self::BELONGS_TO, 'Estado', 'estado'),
            'idAlumno' => array(self::BELONGS_TO, 'Usuario', 'id_alumno'),
            'idCreador' => array(self::BELONGS_TO, 'Usuario', 'id_creador'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_evaluacion_proyecto_guia' => 'Id Evaluacion Proyecto Guia',
            'id_evaluacion_proyecto_guia_padre' => 'Id Evaluacion Proyecto Guia Padre',
            'id_proyecto' => 'Proyecto',
            'id_alumno' => 'Alumno',
            'id_creador' => 'Creador',
            'fecha_actualizacion' => 'Fecha de Actualización',
            'cumple_objetivo' => '¿Se cumplieron los objetivos planteados? ',
            'desarrollo_manifiesta_iniciativa' => 'El alumno ha manifestado inicitativas propias que han permitido enriquecer su trabajo',
            'desarrollo_desarrolla_conocimiento' => 'El alumno muestra desarrollo del conocimiento en el tema',
            'informe_destaca_importante' => 'El informe destaca lo importante',
            'informe_expone_claramente' => 'El informe expone claramente el tema',
            'informe_bien_estructurado' => 'El informe se encuentra bien estructurado',
            'informe_adecuada_bibliografia' => 'Se ha realizado una adecuada revisión bibliográfica',
            'informe_plantea_opinion' => 'Plantea opiniones, conclusiones y/o aportes personales',
            'producto_ajusta_requerimiento' => 'Se ajusta a los requerimientos iniciales',
            'producto_interfaz_adecuada' => 'Interfaz adecuada',
            'producto_robustez' => 'Robustez',
            'producto_documentacion_completa' => 'Documentación completa incorporada al informe',
            'producto_especifica_proceso' => 'Especifica proceso de desarrollo de software',
            'comentarios' => 'Comentarios',
        );
    }

    public function obtienePromedio() {
        $suma = (($this->desarrollo_cumple_plazo +
                $this->desarrollo_desarrolla_conocimiento +
                $this->desarrollo_manifiesta_iniciativa +
                $this->informe_adecuada_bibliografia +
                $this->informe_bien_estructurado +
                $this->informe_destaca_importante +
                $this->informe_expone_claramente +
                $this->informe_plantea_opinion +
                $this->producto_ajusta_requerimiento +
                $this->producto_documentacion_completa +
                $this->producto_interfaz_adecuada +
                $this->producto_especifica_proceso +
                $this->producto_robustez) / 13) * 10;
        return round($suma, 2, PHP_ROUND_HALF_UP) . " / " . Utilidades::$arrayEquivalenciaNota[round($suma, 0, PHP_ROUND_HALF_UP)];
    }

    public function obtienePromedioPonderado() {
        $suma = (($this->desarrollo_cumple_plazo +
                $this->desarrollo_desarrolla_conocimiento +
                $this->desarrollo_manifiesta_iniciativa +
                $this->informe_adecuada_bibliografia +
                $this->informe_bien_estructurado +
                $this->informe_destaca_importante +
                $this->informe_expone_claramente +
                $this->informe_plantea_opinion +
                $this->producto_ajusta_requerimiento +
                $this->producto_documentacion_completa +
                $this->producto_interfaz_adecuada +
                $this->producto_especifica_proceso +
                $this->producto_robustez) / 13) * 10;
        return round(($suma * 0.36), 2, PHP_ROUND_HALF_UP) . " / " . Utilidades::$arrayEquivalenciaNota[round(($suma * 0.36), 0, PHP_ROUND_HALF_UP)];
    }
    public function obtienePromedioPuro() {
        $suma = (($this->desarrollo_cumple_plazo +
                $this->desarrollo_desarrolla_conocimiento +
                $this->desarrollo_manifiesta_iniciativa +
                $this->informe_adecuada_bibliografia +
                $this->informe_bien_estructurado +
                $this->informe_destaca_importante +
                $this->informe_expone_claramente +
                $this->informe_plantea_opinion +
                $this->producto_ajusta_requerimiento +
                $this->producto_documentacion_completa +
                $this->producto_interfaz_adecuada +
                $this->producto_especifica_proceso +
                $this->producto_robustez) / 13) * 10;
        return round($suma , 2, PHP_ROUND_HALF_UP);
    }

    public function evaluacionCompleta() {
        return $this->desarrollo_cumple_plazo != NULL &&
                $this->desarrollo_desarrolla_conocimiento != NULL &&
                $this->desarrollo_manifiesta_iniciativa != NULL &&
                $this->informe_adecuada_bibliografia != NULL &&
                $this->informe_bien_estructurado != NULL &&
                $this->informe_destaca_importante != NULL &&
                $this->informe_expone_claramente != NULL &&
                $this->informe_plantea_opinion != NULL &&
                $this->producto_ajusta_requerimiento != NULL &&
                $this->producto_documentacion_completa != NULL &&
                $this->producto_interfaz_adecuada != NULL &&
                $this->producto_especifica_proceso != NULL &&
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

        $criteria->compare('id_evaluacion_proyecto_guia', $this->id_evaluacion_proyecto_guia);
        $criteria->compare('id_evaluacion_proyecto_guia_padre', $this->id_evaluacion_proyecto_guia_padre);
        $criteria->compare('id_proyecto', $this->id_proyecto);
        $criteria->compare('id_alumno', $this->id_alumno);
        $criteria->compare('id_creador', $this->id_creador);
        $criteria->compare('fecha_actualizacion', $this->fecha_actualizacion, true);
        $criteria->compare('desarrollo_cumple_plazo', $this->desarrollo_cumple_plazo);
        $criteria->compare('desarrollo_manifiesta_iniciativa', $this->desarrollo_manifiesta_iniciativa);
        $criteria->compare('desarrollo_desarrolla_conocimiento', $this->desarrollo_desarrolla_conocimiento);
        $criteria->compare('informe_destaca_importante', $this->informe_destaca_importante);
        $criteria->compare('informe_expone_claramente', $this->informe_expone_claramente);
        $criteria->compare('informe_bien_estructurado', $this->informe_bien_estructurado);
        $criteria->compare('informe_adecuada_bibliografia', $this->informe_adecuada_bibliografia);
        $criteria->compare('informe_plantea_opinion', $this->informe_plantea_opinion);
        $criteria->compare('producto_ajusta_requerimiento', $this->producto_ajusta_requerimiento);
        $criteria->compare('producto_interfaz_adecuada', $this->producto_interfaz_adecuada);
        $criteria->compare('producto_robustez', $this->producto_robustez);
        $criteria->compare('producto_documentacion_completa', $this->producto_documentacion_completa);
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
            //nuevo cambio crear nueva propuesta y agregar al historial de cambios
            //$propuesta = new Propuesta;
            $newDate3 = DateTime::createFromFormat('d/m/Y', $this->fecha_actualizacion);
            if ($newDate3 != null)
                $this->fecha_actualizacion = $newDate3->format('Y-m-d');
            else
                $this->fecha_actualizacion = NULL;
            $evaluacion = EvaluacionProyectoGuia::model()->findByPk($this->id_evaluacion_proyecto_guia);
            $evaluacion->id_evaluacion_proyecto_guia_padre = $this->id_evaluacion_proyecto_guia;
            $evaluacion->id_evaluacion_proyecto_guia = null;
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