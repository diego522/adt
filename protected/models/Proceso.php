<?php

/**
 * This is the model class for table "proceso".
 *
 * The followings are the available columns in table 'proceso':
 * @property integer $id_proceso
 * @property string $fecha_creacion
 * @property string $fecha_inicio
 * @property string $titulo
 * @property string $fecha_fin
 * @property integer $estado
 * @property integer $id_campus
 * @property string $fecha_fin_proyecto
 *
 * The followings are the available model relations:
 * @property Estado $estado0
 * @property Propuesta[] $propuestas
 * @property Propuesta[] $propuestas1
 */
class Proceso extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Proceso the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'proceso';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('titulo,fecha_inicio,fecha_fin,fecha_fin_proyecto', 'required'),
            //array('estado', 'required', 'on' => 'update'),
            array('estado', 'numerical', 'integerOnly' => true),
            array('fecha_creacion,fecha_fin,fecha_fin_proyecto', 'validacionDeFechas'),
            array('estado,titulo,fecha_inicio, fecha_fin, fecha_fin_proyecto', 'safe'),
            array('id_campus', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_proceso, fecha_creacion, fecha_inicio, fecha_fin, estado, fecha_fin_proyecto', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'estado0' => array(self::BELONGS_TO, 'Estado', 'estado'),
            'campus0' => array(self::BELONGS_TO, 'Campus', 'id_campus'),
            'propuestas' => array(self::HAS_MANY, 'Propuesta', 'id_proceso'),
            'propuestas1' => array(self::MANY_MANY, 'Propuesta', 'propuesta_reutilizada(id_proceso, id_propuesta)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_proceso' => 'Código del periodo',
            'titulo' => 'Título',
            'fecha_creacion' => 'Fecha de creación',
            'fecha_inicio' => 'Fecha de apertura',
            'fecha_fin' => 'Fecha de cierre',
            'id_campus' => 'Campus',
            'estado' => 'Estado',
            'fecha_fin_proyecto' => 'Finalización de proyectos',
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
        $criteria->compare('id_proceso', $this->id_proceso);
        $criteria->compare('fecha_creacion', $this->fecha_creacion, true);
        $newDate1 = DateTime::createFromFormat('d/m/Y H:i', $this->fecha_inicio);
        if ($newDate1 != null)
            $this->fecha_inicio = $newDate1->format('Y-m-d H:i:s');
        $criteria->compare('fecha_inicio', $this->fecha_inicio, true);
        $criteria->compare('fecha_fin', $this->fecha_fin, true);
        $criteria->compare('estado', $this->estado);
        $criteria->compare('fecha_fin_proyecto', $this->fecha_fin_proyecto, true);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function validacionDeFechas($attribute, $params = null) {
        $inicio = CDateTimeParser::parse($this->fecha_inicio, "dd/MM/yyyy HH:mm");
        $fin = CDateTimeParser::parse($this->fecha_fin, "dd/MM/yyyy HH:mm");
        $proyec = CDateTimeParser::parse($this->fecha_fin_proyecto, "dd/MM/yyyy HH:mm");
        if ($inicio != NULL && $fin != NULL) {
            if ($inicio >= $fin) {
                $this->addError('fecha_inicio', 'La fecha no corresponde');
                $this->addError('fecha_fin', 'La fecha no corresponde');
            }
            if ($this->fecha_fin_proyecto != NULL) {

                if (($proyec <= $inicio || $proyec <= $fin)) {
                    $this->addError('fecha_fin_proyecto', 'La fecha no corresponde');
                }
            }
        }
    }

    protected function afterFind() {
        // convert to display format
        $this->fecha_creacion = Yii::app()->dateFormatter->format("dd/MM/y HH:mm", strtotime($this->fecha_creacion));
        $this->fecha_inicio = Yii::app()->dateFormatter->format("dd/MM/y HH:mm", strtotime($this->fecha_inicio));
        $this->fecha_fin = Yii::app()->dateFormatter->format("dd/MM/y HH:mm", strtotime($this->fecha_fin));
        $this->fecha_fin_proyecto = Yii::app()->dateFormatter->format("dd/MM/y HH:mm", strtotime($this->fecha_fin_proyecto));
        parent::afterFind();
    }

    public static function obtieneProcesoActual() {
        return Proceso::model()->find('NOW() between fecha_inicio and fecha_fin and id_campus=' . Yii::app()->user->getState('campus') . ' and estado=' . Estado::$PROCESO_ABIERTO.' order by id_proceso DESC');
    }

    public function beforeSave() {
        if ($this->isNewRecord) {
            $this->fecha_creacion = new CDbExpression('NOW()');
        } else {
            $newDate = DateTime::createFromFormat('d/m/Y H:i', $this->fecha_creacion);
            if ($newDate != null)
                $this->fecha_creacion = $newDate->format('Y-m-d H:i:s');
        }
        $newDate2 = DateTime::createFromFormat('d/m/Y H:i', $this->fecha_inicio);
        if ($newDate2 != null)
            $this->fecha_inicio = $newDate2->format('Y-m-d H:i:s');
        $newDate3 = DateTime::createFromFormat('d/m/Y H:i', $this->fecha_fin);
        if ($newDate3 != null)
            $this->fecha_fin = $newDate3->format('Y-m-d H:i:s');
        $newDate4 = DateTime::createFromFormat('d/m/Y H:i', $this->fecha_fin_proyecto);
        if ($newDate4 != null)
            $this->fecha_fin_proyecto = $newDate4->format('Y-m-d H:i:s');

        //$this->modified = new CDbExpression('NOW()');
        return parent::beforeSave();
    }

}