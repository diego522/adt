<?php

/**
 * This is the model class for table "defensa".
 *
 * The followings are the available columns in table 'defensa':
 * @property integer $id_defensa
 * @property string $fecha_creacion
 * @property string $fecha_programacion
 * @property integer $id_proyecto
 * @property string $lugar
 * @property string $observaciones
 *
 * The followings are the available model relations:
 * @property Proyecto $idProyecto
 */
class Defensa extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Defensa the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'defensa';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('fecha_programacion, id_proyecto, lugar', 'required'),
            array('id_proyecto', 'numerical', 'integerOnly' => true),
            array('lugar, observaciones', 'length', 'max' => 2000),
            array('fecha_programacion', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_defensa, fecha_creacion, fecha_programacion, id_proyecto, lugar, observaciones', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idProyecto' => array(self::BELONGS_TO, 'Proyecto', 'id_proyecto'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_defensa' => 'Id Defensa',
            'fecha_creacion' => 'Fecha de Creación',
            'fecha_programacion' => 'Fecha de Planificación',
            'id_proyecto' => 'Proyecto',
            'lugar' => 'Lugar',
            'observaciones' => 'Observaciones',
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

        $criteria->compare('id_defensa', $this->id_defensa);
        $criteria->compare('fecha_creacion', $this->fecha_creacion, true);
        $criteria->compare('fecha_programacion', $this->fecha_programacion, true);
        $criteria->compare('id_proyecto', $this->id_proyecto);
        $criteria->compare('lugar', $this->lugar, true);
        $criteria->compare('observaciones', $this->observaciones, true);

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

        $newDate = DateTime::createFromFormat('d/m/Y H:i', $this->fecha_programacion);
        if ($newDate != null)
            $this->fecha_programacion = $newDate->format('Y-m-d H:i:s');
        $newDate1 = DateTime::createFromFormat('d/m/Y H:i', $this->fecha_creacion);
        if ($newDate1 != null)
            $this->fecha_creacion = $newDate1->format('Y-m-d H:i:s');
        return parent::beforeSave();
    }

    protected function afterFind() {
        // convert to display format
        $this->fecha_programacion != NULL ? $this->fecha_programacion = Yii::app()->dateFormatter->format("dd/MM/y HH:mm", strtotime($this->fecha_programacion)) : '';
        $this->fecha_creacion != NULL ? $this->fecha_creacion = Yii::app()->dateFormatter->format("dd/MM/y HH:mm", strtotime($this->fecha_creacion)) : '';
        parent::afterFind();
    }

}