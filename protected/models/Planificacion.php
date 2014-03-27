<?php

/**
 * This is the model class for table "planificacion".
 *
 * The followings are the available columns in table 'planificacion':
 * @property integer $id_planificacion
 * @property string $fecha_creacion
 * @property string $fecha_hito_cumplido
 * @property integer $id_proyecto
 * @property integer $estado
 * @property string $avance
 * @property string $descripcion
 * @property string $titulo
 * @property integer $creador
 * @property string $fecha_plan
 *
 * The followings are the available model relations:
 * @property Avance[] $avances
 * @property Proyecto $idProyecto
 * @property Estado $estado0
 * @property Usuario $creador0
 */
class Planificacion extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Planificacion the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'planificacion';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('avance, descripcion,fecha_plan,titulo', 'required'),
            array('id_proyecto, estado, creador', 'numerical', 'integerOnly' => true),
            array('avance', 'numerical'),
            array('avance', 'validaAvance'),
            array('fecha_plan,fecha_hito_cumplido', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_planificacion, fecha_creacion, id_proyecto, estado, avance, descripcion, creador, fecha_plan', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'avances' => array(self::HAS_MANY, 'Avance', 'id_planificacion'),
            'idProyecto' => array(self::BELONGS_TO, 'Proyecto', 'id_proyecto'),
            'estado0' => array(self::BELONGS_TO, 'Estado', 'estado'),
            'creador0' => array(self::BELONGS_TO, 'Usuario', 'creador'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_planificacion' => 'Código',
            'fecha_creacion' => 'Fecha de Creación',
            'id_proyecto' => 'Código proyecto',
            'fecha_hito_cumplido' => 'Fecha de Cumplimiento',
            'estado' => 'Estado',
            'titulo' => 'Título',
            'avance' => 'Progreso asignado',
            'descripcion' => 'Descripción',
            'creador' => 'Creador',
            'fecha_plan' => 'Fecha objetivo',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search($idp) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id_planificacion', $this->id_planificacion);
        $criteria->compare('fecha_creacion', $this->fecha_creacion, true);
        $criteria->compare('id_proyecto', $this->id_proyecto);
        $criteria->compare('estado', $this->estado);
        $criteria->compare('avance', $this->avance, true);
        $criteria->compare('descripcion', $this->descripcion, true);
        $criteria->compare('creador', $this->creador);
        $criteria->compare('fecha_plan', $this->fecha_plan, true);
        $criteria->addCondition("id_proyecto=" . $idp);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function beforeSave() {
        if ($this->isNewRecord) {
            $this->fecha_creacion = new CDbExpression('NOW()');
            $this->estado = Estado::$PLANIFICACION_PENDIENTE;
            $this->creador = Yii::app()->user->id;
            $newDate2 = DateTime::createFromFormat('d/m/Y', $this->fecha_plan);
            if ($newDate2 != null)
                $this->fecha_plan = $newDate2->format('Y-m-d');
        } else {
            $newDate = DateTime::createFromFormat('d/m/Y', $this->fecha_creacion);
            if ($newDate != null)
                $this->fecha_creacion = $newDate->format('Y-m-d');
            $newDate3 = DateTime::createFromFormat('d/m/Y', $this->fecha_hito_cumplido);
            if ($newDate3 != null)
                $this->fecha_hito_cumplido = $newDate3->format('Y-m-d');
            $newDate2 = DateTime::createFromFormat('d/m/Y', $this->fecha_plan);
            if ($newDate2 != null)
                $this->fecha_plan = $newDate2->format('Y-m-d');
        }
        //$this->modified = new CDbExpression('NOW()');
        return parent::beforeSave();
    }

    protected function afterFind() {
        // convert to display format
        $this->fecha_creacion != NULL ? $this->fecha_creacion = Yii::app()->dateFormatter->format("dd/MM/y", strtotime($this->fecha_creacion)) : '';
        $this->fecha_hito_cumplido != NULL ? $this->fecha_hito_cumplido = Yii::app()->dateFormatter->format("dd/MM/y", strtotime($this->fecha_hito_cumplido)) : '';
        $this->fecha_plan != NULL ? $this->fecha_plan = Yii::app()->dateFormatter->format("dd/MM/y", strtotime($this->fecha_plan)) : '';
        parent::afterFind();
    }

    /* Retorna el porcentaje de avance que tiene el proyecto 
     * @param intger $id es la Id del proyecto a calcular su progrso
     * @return integer retornta la suma de los porcentges cumplidos
     */

    public static function porcentajeDeAvance($id) {
        $sql = "select  ifnull(sum(avance),0) as avance from planificacion where estado=" . Estado::$PLANIFICACION_CUMPLIDA . " and id_proyecto=" . $id;
        return Yii::app()->db->createCommand($sql)->queryScalar();
    }

    public static function porcentajePlanificado($id) {
        $sql = "select  ifnull(sum(avance),0) as avance from planificacion where  id_proyecto=" . $id;
        return Yii::app()->db->createCommand($sql)->queryScalar();
    }

    public static function numeroDeHitosCumplidos($id) {
        $sql = "select  count(id_planificacion) as num_cumplidos from planificacion where estado=" . Estado::$PLANIFICACION_CUMPLIDA . " and id_proyecto=" . $id;
        return Yii::app()->db->createCommand($sql)->queryScalar();
    }

    public static function numeroDeHitosPendientes($id) {
        $sql = "select  count(id_planificacion) as num_cumplidos from planificacion where estado=" . Estado::$PLANIFICACION_PENDIENTE . " and id_proyecto=" . $id;
        return Yii::app()->db->createCommand($sql)->queryScalar();
    }

    public function validaAvance($attribute, $params = null) {
        if ($this->avance <= 0) {
            $this->addError('avance', 'el porcentaje no corresponde');
        }
        if ($this->id_planificacion == NULL) {
            if ($this->avance + (Planificacion::porcentajePlanificado($this->id_proyecto)) > 100)
                $this->addError('avance', 'se ha excedido en el porcentaje asignado');
        }else {
            if ($this->avance + ((Planificacion::porcentajePlanificado($this->id_proyecto))-Planificacion::model()->findByPk($this->id_planificacion)->avance)> 100)
                $this->addError('avance', 'se ha excedido en el porcentaje asignado');
        }
    }

}