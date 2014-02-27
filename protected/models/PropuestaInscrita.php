<?php

/**
 * This is the model class for table "propuesta_inscrita".
 *
 * The followings are the available columns in table 'propuesta_inscrita':
 * @property integer $id_propuesta_inscrita
 * @property integer $id_propuesta
 * @property integer $usuario
 * @property string $fecha_creacion
 *
 * The followings are the available model relations:
 * @property Propuesta $idPropuesta
 * @property Usuario $usuario0
 */
class PropuestaInscrita extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PropuestaInscrita the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'propuesta_inscrita';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_propuesta, usuario, fecha_creacion', 'required'),
			array('id_propuesta, usuario', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_propuesta_inscrita, id_propuesta, usuario, fecha_creacion', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idPropuesta' => array(self::BELONGS_TO, 'Propuesta', 'id_propuesta'),
			'usuario0' => array(self::BELONGS_TO, 'Usuario', 'usuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_propuesta_inscrita' => 'Id Propuesta Inscrita',
			'id_propuesta' => 'Id Propuesta',
			'usuario' => 'Usuario',
			'fecha_creacion' => 'Fecha Creacion',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_propuesta_inscrita',$this->id_propuesta_inscrita);
		$criteria->compare('id_propuesta',$this->id_propuesta);
		$criteria->compare('usuario',$this->usuario);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}