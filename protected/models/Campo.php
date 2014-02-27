<?php

/**
 * This is the model class for table "campo".
 *
 * The followings are the available columns in table 'campo':
 * @property integer $id_campo
 * @property integer $id_tipo_campo
 * @property string $campo
 *
 * The followings are the available model relations:
 * @property TipoCampo $idTipoCampo
 */
class Campo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Campo the static model class
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
		return 'campo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_tipo_campo, campo', 'required'),
			array('id_tipo_campo', 'numerical', 'integerOnly'=>true),
			array('campo', 'length', 'max'=>2000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_campo, id_tipo_campo, campo', 'safe', 'on'=>'search'),
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
			'idTipoCampo' => array(self::BELONGS_TO, 'TipoCampo', 'id_tipo_campo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_campo' => 'Id Campo',
			'id_tipo_campo' => 'Id Tipo Campo',
			'campo' => 'Campo',
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

		$criteria->compare('id_campo',$this->id_campo);
		$criteria->compare('id_tipo_campo',$this->id_tipo_campo);
		$criteria->compare('campo',$this->campo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}