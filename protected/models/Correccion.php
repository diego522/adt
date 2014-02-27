<?php

/**
 * This is the model class for table "correccion".
 *
 * The followings are the available columns in table 'correccion':
 * @property integer $id_correccion
 * @property integer $id_avance
 * @property integer $id_proyecto
 * @property string $fecha_creacion
 * @property integer $creador
 * @property string $descripcion
 * @property integer $adjunto
 * @property string $titulo
 * The followings are the available model relations:
 * @property Proyecto $idProyecto
 * @property Avance $idAvance
 * @property Usuario $creador0
 * @property Adjunto $adjunto0
 */
class Correccion extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Correccion the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'correccion';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('descripcion,titulo', 'required'),
            array('id_avance, id_proyecto, creador, adjunto', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_correccion, id_avance, id_proyecto, fecha_creacion, creador, descripcion, adjunto', 'safe', 'on' => 'search'),
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
            'idAvance' => array(self::BELONGS_TO, 'Avance', 'id_avance'),
            'creador0' => array(self::BELONGS_TO, 'Usuario', 'creador'),
            'adjunto0' => array(self::BELONGS_TO, 'Adjunto', 'adjunto'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_correccion' => 'Código',
            'id_avance' => 'Avance',
            'titulo' => 'Título',
            'id_proyecto' => 'Proyecto',
            'fecha_creacion' => 'Fecha de Creación',
            'creador' => 'Creador',
            'descripcion' => 'Descripción',
            'adjunto' => 'Adjunto',
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

        $criteria->compare('id_correccion', $this->id_correccion);
        $criteria->compare('id_avance', $this->id_avance);
        $criteria->compare('id_proyecto', $this->id_proyecto);
        $criteria->compare('fecha_creacion', $this->fecha_creacion, true);
        $criteria->compare('creador', $this->creador);
        $criteria->compare('descripcion', $this->descripcion, true);
        $criteria->compare('adjunto', $this->adjunto);

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
        }
        //$this->modified = new CDbExpression('NOW()');
        return parent::beforeSave();
    }

    protected function afterFind() {
        // convert to display format
        $this->fecha_creacion != NULL ? $this->fecha_creacion = Yii::app()->dateFormatter->format("dd/MM/y HH:mm", strtotime($this->fecha_creacion)) : '';
        parent::afterFind();
    }

}