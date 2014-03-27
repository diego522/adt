<?php

/**
 * This is the model class for table "solicitud".
 *
 * The followings are the available columns in table 'solicitud':
 * @property integer $id_solicitud
 * @property integer $id_tipo_solicitud
 * @property string $fecha_creacion
 * @property string $fecha_respuesta
 * @property string $respuesta
 * @property integer $creador
 * @property string $motivo
 * @property integer $estado
 * @property integer $id_proyecto
 *
 * The followings are the available model relations:
 * @property Estado $estado0
 * @property Proyecto $idProyecto
 * @property TipoSolicitud $idTipoSolicitud
 * @property Usuario $creador0
 */
class Solicitud extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Solicitud the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'solicitud';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_tipo_solicitud, motivo', 'required','on'=>'create,update'),
            array('estado', 'required','on'=>'resolver'),
            array('id_tipo_solicitud, creador, estado, id_proyecto', 'numerical', 'integerOnly' => true),
            array('respuesta','safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_solicitud, id_tipo_solicitud, fecha_creacion, creador, motivo, estado, id_proyecto', 'safe', 'on' => 'search'),
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
            'idProyecto' => array(self::BELONGS_TO, 'Proyecto', 'id_proyecto'),
            'idTipoSolicitud' => array(self::BELONGS_TO, 'TipoSolicitud', 'id_tipo_solicitud'),
            'creador0' => array(self::BELONGS_TO, 'Usuario', 'creador'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_solicitud' => 'Código',
            'id_tipo_solicitud' => 'Tipo de Solicitud',
            'fecha_creacion' => 'Fecha de Solicitud',
            'fecha_respuesta' => 'Fecha de Respuesta',
            'respuesta' => 'Respuesta',
            'creador' => 'Creador',
            'motivo' => 'Motivo',
            'estado' => 'Estado',
            'id_proyecto' => 'Id Proyecto',
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

        $criteria->compare('id_solicitud', $this->id_solicitud);
        $criteria->compare('id_tipo_solicitud', $this->id_tipo_solicitud);
        $criteria->compare('fecha_creacion', $this->fecha_creacion, true);
        $criteria->compare('creador', $this->creador);
        $criteria->compare('motivo', $this->motivo, true);
        $criteria->compare('estado', $this->estado);
        $criteria->compare('id_proyecto', $this->id_proyecto);
        $criteria->addCondition('id_proyecto in (select id_proyecto from proyecto where id_propuesta in (select id_propuesta from 
            propuesta where id_campus=' . Yii::app()->user->getState('campus') . '))');
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function viewSolicitudes($idP) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id_solicitud', $this->id_solicitud);
        $criteria->compare('id_tipo_solicitud', $this->id_tipo_solicitud);
        $criteria->compare('fecha_creacion', $this->fecha_creacion, true);
        $criteria->compare('creador', $this->creador);
        $criteria->compare('motivo', $this->motivo, true);
        $criteria->compare('estado', $this->estado);
       // $criteria->compare('id_proyecto', $this->id_proyecto);
        $criteria->addCondition('id_proyecto='.$idP);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function beforeSave() {
        if ($this->isNewRecord) {
            $this->fecha_creacion = new CDbExpression('NOW()');
        } else {
            
            $newDate = DateTime::createFromFormat('d/m/Y H:i', $this->fecha_creacion);
            if ($newDate != null)
                $this->fecha_creacion = $newDate->format('Y-m-d H:i:s');
            $newDate2 = DateTime::createFromFormat('d/m/Y H:i', $this->fecha_respuesta);
            if ($newDate2 != null)
                $this->fecha_respuesta = $newDate2->format('Y-m-d H:i:s');
            if($this->scenario == 'resolver'){
                $this->fecha_respuesta = new CDbExpression('NOW()');
            }else{
                $this->fecha_respuesta=NULL;
            }
        }
        //$this->modified = new CDbExpression('NOW()');
        return parent::beforeSave();
    }

    protected function afterFind() {
        // convert to display format
        $this->fecha_creacion != NULL ? $this->fecha_creacion = Yii::app()->dateFormatter->format("dd/MM/y HH:mm", strtotime($this->fecha_creacion)) : '';
        $this->fecha_respuesta != NULL ? $this->fecha_respuesta = Yii::app()->dateFormatter->format("dd/MM/y HH:mm", strtotime($this->fecha_respuesta)) : '';
        parent::afterFind();
    }

}