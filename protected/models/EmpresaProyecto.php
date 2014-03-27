<?php

/**
 * This is the model class for table "empresa_proyecto".
 *
 * The followings are the available columns in table 'empresa_proyecto':
 * @property integer $id_empresa_proyecto
 * @property string $nombre_encargado
 * @property string $nombre_empresa
 * @property string $cargo
 * @property string $rut
 * @property integer $id_proyecto
 *
 * The followings are the available model relations:
 * @property Proyecto $idProyecto
 */
class EmpresaProyecto extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return EmpresaProyecto the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'empresa_proyecto';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nombre_encargado, cargo, rut, id_proyecto', 'required'),
            array('id_proyecto', 'numerical', 'integerOnly' => true),
            array('nombre_encargado, nombre_empresa, cargo', 'length', 'max' => 2000),
            array('rut', 'length', 'max' => 20),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_empresa_proyecto, nombre_encargado, nombre_empresa, cargo, rut, id_proyecto', 'safe', 'on' => 'search'),
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
            'id_empresa_proyecto' => 'Id Empresa Proyecto',
            'nombre_encargado' => 'Nombre Encargado',
            'nombre_empresa' => 'Nombre Empresa',
            'cargo' => 'Encargado de',
            'rut' => 'Rut',
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

        $criteria->compare('id_empresa_proyecto', $this->id_empresa_proyecto);
        $criteria->compare('nombre_encargado', $this->nombre_encargado, true);
        $criteria->compare('nombre_empresa', $this->nombre_empresa, true);
        $criteria->compare('cargo', $this->cargo, true);
        $criteria->compare('rut', $this->rut, true);
        $criteria->compare('id_proyecto', $this->id_proyecto);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}