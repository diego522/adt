<?php

/**
 * This is the model class for table "avance".
 *
 * The followings are the available columns in table 'avance':
 * @property integer $id_avance
 * @property integer $id_planificacion
 * @property integer $id_proyecto
 * @property string $descripcion
 * @property string $fecha_creacion
 * @property integer $ruta_adjunto
 * @property integer $creador
 * @property string $titulo
 * The followings are the available model relations:
 * @property Adjunto $rutaAdjunto
 * @property Proyecto $idProyecto
 * @property Planificacion $idPlanificacion
 * @property Usuario $creador0
 * @property Correccion[] $correccions
 */
class Avance extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Avance the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'avance';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_proyecto, descripcion,titulo', 'required'),
            array('id_planificacion, id_proyecto, ruta_adjunto, creador', 'numerical', 'integerOnly' => true),
            //array('descripcion', 'length', 'max' => 2000),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_avance, id_planificacion, id_proyecto, descripcion, fecha_creacion, ruta_adjunto, creador', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'rutaAdjunto' => array(self::BELONGS_TO, 'Adjunto', 'ruta_adjunto'),
            'idProyecto' => array(self::BELONGS_TO, 'Proyecto', 'id_proyecto'),
            'idPlanificacion' => array(self::BELONGS_TO, 'Planificacion', 'id_planificacion'),
            'creador0' => array(self::BELONGS_TO, 'Usuario', 'creador'),
            'correccions' => array(self::HAS_MANY, 'Correccion', 'id_avance'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_avance' => 'Código',
            'id_planificacion' => 'Planificación',
            'id_proyecto' => 'Proyecto',
            'titulo' => 'Título',
            'descripcion' => 'Descripción',
            'fecha_creacion' => 'Fecha de Creación',
            'ruta_adjunto' => 'Adjunto',
            'creador' => 'Creador',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search($idPlan) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id_avance', $this->id_avance);
        $criteria->compare('id_planificacion', $this->id_planificacion);
        $criteria->compare('id_proyecto', $this->id_proyecto);
        $criteria->compare('descripcion', $this->descripcion, true);
        $criteria->compare('fecha_creacion', $this->fecha_creacion, true);
        $criteria->compare('ruta_adjunto', $this->ruta_adjunto);
        $criteria->compare('creador', $this->creador);
        $criteria->addCondition("id_planificacion=" . $idPlan);

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

    /* protected function beforeDelete() { */
    /* if($this->rutaAdjunto!=NULL)
      $this->rutaAdjunto->delete(); */
    /* $correcciones=  Correccion::model()->findAll('id_avance='.$this->id_avance);    
      foreach($correcciones as $c){
      $c->delete();
      } */
    /*  parent::beforeDelete();
      } */
}