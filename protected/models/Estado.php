<?php

/**
 * This is the model class for table "estado".
 *
 * The followings are the available columns in table 'estado':
 * @property integer $id_estado
 * @property integer $id_tipo_estado
 * @property string $nombre
 * @property integer $orden
 *
 * The followings are the available model relations:
 * @property TipoEstado $idTipoEstado
 * @property Planificacion[] $planificacions
 * @property Proceso[] $procesos
 * @property Propuesta[] $propuestas
 * @property Propuesta[] $propuestas1
 * @property Proyecto[] $proyectos
 * @property Solicitud[] $solicituds
 */
class Estado extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Estado the static model class
     */
    //proyecto
    public static $PROYECTO_EN_DESARROLLO = 1;
    public static $PROYECTO_APROBADO = 27;
    public static $PROYECTO_EN_REPROBADO = 9;
    
    //propuesta
    public static $PROPUESTA_DISPONIBLE = 22;
    public static $PROPUESTA_RECHAZADA = 8;
    public static $PROPUESTA_BORRADOR = 30;
    public static $PROPUESTA_ACEPTADA_CON_OBSERVACIONES_SIN_PRESENTACION = 7;
    public static $PROPUESTA_ACEPTADA_CON_OBSERVACIONES_CON_PRESENTACION = 31;
    public static $PROPUESTA_PENDIENTE_DE_REVISION = 3;
    public static $PROPUESTA_PENDIENTE_DE_PUBLICACION = 32;
    public static $PROPUESTA_ACEPTADA = 4;
    public static $PROPUESTA_MODIFICADA = 35;
    
    //Proceso
    public static $PROCESO_PENDIENTE_DE_APERTURA = 12;
    public static $PROCESO_ABIERTO = 13;
    
    //solicitud
    public static $SOLICITUD_PENDIENTE_DE_REVISION = 23;
    public static $SOLICITUD_APROBADA = 24;
    public static $SOLICITUD_APROBADA_PROFESOR_GUIA = 47;
    public static $SOLICITUD_REPROBADA = 25;
    
    //presentacion
    public static $PRESENTACION_ACEPTADA = 28;
    public static $PRESENTACION_RECHAZADA = 29;
    
    //planificicacion
    public static $PLANIFICACION_PENDIENTE = 33;
    public static $PLANIFICACION_CUMPLIDA = 34;
    
    //estados de avance
    public static $AVANCE_SIENDO_REVISADO_POR_PROFESIR_GUIA= 36;
    public static $AVANCE_ESPERANDO_ASIGNACION_DE_INFORMANTE= 42;
    public static $AVANCE_SIENDO_REVISADOR_POR_PROFESOR_INFORMANTE = 37;
    public static $AVANCE_ESPERNADO_DEFENSA = 38;
    public static $AVANCE_ESPERNADO_PLANIFICAR_DEFENSA = 43;
    public static $AVANCE_DEFENDIDO = 44;
    public static $AVANCE_TERMINADO = 39;
    
    
    //EVALUACIÓN
    public static $EVALUACION_ENVIADA = 46;
    public static $EVALUACION_PENDIENTE_DE_ENVIO = 45;
    

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'estado';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_tipo_estado, nombre, orden', 'required'),
            array('id_tipo_estado, orden', 'numerical', 'integerOnly' => true),
            array('nombre', 'length', 'max' => 200),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_estado, id_tipo_estado, nombre, orden', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idTipoEstado' => array(self::BELONGS_TO, 'TipoEstado', 'id_tipo_estado'),
            'planificacions' => array(self::HAS_MANY, 'Planificacion', 'estado'),
            'procesos' => array(self::HAS_MANY, 'Proceso', 'estado'),
            'propuestas' => array(self::HAS_MANY, 'Propuesta', 'estado'),
            'propuestas1' => array(self::HAS_MANY, 'Propuesta', 'estado_presentacion'),
            'proyectos' => array(self::HAS_MANY, 'Proyecto', 'estado_actual'),
            'solicituds' => array(self::HAS_MANY, 'Solicitud', 'estado'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_estado' => 'Id Estado',
            'id_tipo_estado' => 'Id Tipo Estado',
            'nombre' => 'Nombre',
            'orden' => 'Orden',
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

        $criteria->compare('id_estado', $this->id_estado);
        $criteria->compare('id_tipo_estado', $this->id_tipo_estado);
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('orden', $this->orden);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}