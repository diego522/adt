<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $id_usuario
 * @property string $nombre
 * @property string $username
 * @property string $dv
 * @property string $password
 * @property string $apellido
 * @property integer $id_rol
 * @property string $email
 * @property string $direccion
 * @property string $telefono
 * @property integer $carrera
 * @property integer $plan
 * @property integer $campus
 *
 * The followings are the available model relations:
 * @property Adjunto[] $adjuntos
 * @property Avance[] $avances
 * @property Correccion[] $correccions
 * @property Planificacion[] $planificacions
 * @property Propuesta[] $propuestas
 * @property PropuestaInscrita[] $propuestaInscritas
 * @property Proyecto[] $proyectos
 * @property Proyecto[] $proyectos1
 * @property Proyecto[] $proyectos2
 * @property Solicitud[] $solicituds
 * @property Campus $campus0
 * @property Rol $idRol
 */
class Usuario extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Usuario the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'usuario';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nombre, username, email,campus,', 'required'),
            array('id_usuario, id_rol, carrera, plan, campus', 'numerical', 'integerOnly' => true),
            array('nombre', 'length', 'max' => 300),
            array('direccion,telefono', 'safe'),
            array('email', 'email'),
            array('username, password, apellido, email', 'length', 'max' => 200),
            array('dv', 'length', 'max' => 1),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_usuario, nombre, username, dv, password, apellido, id_rol, email, carrera, plan, campus', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'adjuntos' => array(self::HAS_MANY, 'Adjunto', 'creador'),
            'avances' => array(self::HAS_MANY, 'Avance', 'creador'),
            'correccions' => array(self::HAS_MANY, 'Correccion', 'creador'),
            'planificacions' => array(self::HAS_MANY, 'Planificacion', 'creador'),
            'propuestas' => array(self::HAS_MANY, 'Propuesta', 'usuario_creador'),
            'propuestaInscritas' => array(self::HAS_MANY, 'PropuestaInscrita', 'usuario'),
            'proyectos' => array(self::HAS_MANY, 'Proyecto', 'prof_guia'),
            'proyectos1' => array(self::HAS_MANY, 'Proyecto', 'prof_informante'),
            'proyectos2' => array(self::HAS_MANY, 'Proyecto', 'prof_sala'),
            'solicituds' => array(self::HAS_MANY, 'Solicitud', 'creador'),
            'campus0' => array(self::BELONGS_TO, 'Campus', 'campus'),
            'idRol' => array(self::BELONGS_TO, 'Rol', 'id_rol'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_usuario' => 'Id Usuario',
            'nombre' => 'Nombre Completo',
            'username' => 'Rut',
            'telefono' => 'Teléfono',
            'direccion' => 'Dirección',
            'dv' => 'Dv',
            'password' => 'Password',
            'apellido' => 'Apellido',
            'id_rol' => 'Rol',
            'email' => 'Email',
            'carrera' => 'Carrera',
            'plan' => 'Plan',
            'campus' => 'Campus',
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

        $criteria->compare('id_usuario', $this->id_usuario);
        $criteria->compare('nombre', $this->nombre, true);
        $rut = str_replace('.', '', $this->username);
        $arreglo = explode('-', $rut);
        $this->username = $arreglo[0];
        $criteria->compare('username', $this->username, true);
        $criteria->compare('dv', $this->dv, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('apellido', $this->apellido, true);
        $criteria->compare('id_rol', $this->id_rol);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('carrera', $this->carrera);
        $criteria->compare('plan', $this->plan);
        $criteria->compare('campus', $this->campus);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function beforeSave() {

        $rut = str_replace('.', '', $this->username);
        $arreglo = explode('-', $rut);
        $this->username = $arreglo[0];
        $this->dv = $arreglo[1];
        $this->nombre=strtoupper($this->nombre);
        if ($this->isNewRecord) {
            $hash = sha1($this->username, 1);
            $this->password = base64_encode($hash);
        } else {
            
        }

        return parent::beforeSave();
    }

    protected function afterFind() {
        // convert to display format
        $sub_rut = $this->username;
        $x = 2;
        $s = 0;
        for ($i = strlen($sub_rut) - 1; $i >= 0; $i--) {
            if ($x > 7) {
                $x = 2;
            }
            $s += $sub_rut[$i] * $x;
            $x++;
        }
        $dv = 11 - ($s % 11);
        if ($dv == 10) {
            $dv = 'K';
        }
        if ($dv == 11) {
            $dv = '0';
        }
        $this->dv=$dv;
        $this->username = number_format($this->username, 0, '', '.') . '-' . $this->dv;
        parent::afterFind();
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
    

}