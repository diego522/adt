<?php

/**
 * This is the model class for table "propuesta".
 *
 * The followings are the available columns in table 'propuesta':
 * @property integer $id_propuesta
 * @property integer $id_campus
 * @property integer $id_propuesta_padre
 * @property integer $estado
 * @property integer $estado_presentacion
 * @property string $titulo
 * @property string $descripcion
 * @property integer $usuario_creador
 * @property string $fecha_creacion
 * @property string $fecha_resolucion
 * @property string $fecha_resolucion_presentacion
 * @property string $fecha_presentacion
 * @property string $fecha_presenta_propuesta
 * @property integer $id_proceso
 * @property string $observaciones
 * @property string $objetivos
 * @property string $objetivos_especificos
 * @property string $plan_trabajo
 * @property string $justificacion
 * @property integer $adjunto
 * @property string $metodologia
 * @property string $trabajos_simi
 * @property string $bibliografia
 * @property string $nombre_empresa
 * @property string $nombre_responsable
 * @property string $cargo_responsable
 * @property integer $cant_participantes
 * @property string $comentarios
 * @property integer $profesor_guia
 * @property string $prof_co_guia
 *
 * The followings are the available model relations:
 * @property Usuario[] $coGuia
 * @property Usuario $profesorGuia
 * @property Estado $estado0
 * @property Proceso $idProceso
 * @property Propuesta_re $idPropuestaPadre
 * @property Propuesta_re[] $propuestas
 * @property Usuario $usuarioCreador
 * @property Estado $estadoPresentacion
 * @property Adjunto $adjunto0
 * @property Campus $idCampus
 * @property PropuestaInscrita[] $propuestaInscritas
 * @property Proceso[] $procesos
 * @property Proyecto[] $proyectos
 */
class Propuesta extends CActiveRecord {

    public $nombres_alumnos;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Propuesta the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'propuesta';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('titulo, descripcion,cant_participantes ', 'required', 'on' => 'create,modifica'),
            array('id_propuesta_padre, id_campus,estado, estado_presentacion, usuario_creador, id_proceso, adjunto, cant_participantes', 'numerical', 'integerOnly' => true),
            array('fecha_resolucion, prof_co_guia,fecha_resolucion_presentacion, fecha_presentacion, fecha_presenta_propuesta, observaciones, objetivos_especificos,objetivos, plan_trabajo, justificacion, metodologia, trabajos_simi, bibliografia, nombre_empresa, nombre_responsable, cargo_responsable, comentarios', 'safe'),
            //array('fecha_resolucion, fecha_resolucion_presentacion, fecha_presentacion, fecha_presenta_propuesta', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id_campus', 'safe'),
            array('profesor_guia', 'safe'),
            array('titulo,descripcion', 'safe'),
            array('estado', 'required', 'on' => 'resolucion'),
            array('estado,estado_presentacion,profesor_guia,fecha_presentacion', 'validaEnResolucion', 'on' => 'resolucion'),
// The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('objetivos, plan_trabajo, objetivos_especificos,justificacion, metodologia, trabajos_simi, bibliografia', 'required', 'on' => 'revision'),
            array('id_propuesta,nombres_alumnos, id_propuesta_padre, estado, estado_presentacion, titulo, descripcion, usuario_creador, fecha_creacion, fecha_resolucion, fecha_resolucion_presentacion, fecha_presentacion, fecha_presenta_propuesta, id_proceso, observaciones, objetivos, plan_trabajo, justificacion, adjunto, metodologia, trabajos_simi, bibliografia, nombre_empresa, nombre_responsable, cargo_responsable, cant_participantes, comentarios', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'coGuia' => array(self::MANY_MANY, 'Usuario', 'co_guia(id_propuesta, id_co_guia)'),
            'profesorGuia' => array(self::BELONGS_TO, 'Usuario', 'profesor_guia'),
            'estado0' => array(self::BELONGS_TO, 'Estado', 'estado'),
            'idProceso' => array(self::BELONGS_TO, 'Proceso', 'id_proceso'),
            'idPropuestaPadre' => array(self::BELONGS_TO, 'Propuesta', 'id_propuesta_padre'),
            'propuestas' => array(self::HAS_MANY, 'Propuesta', 'id_propuesta_padre'),
            'usuarioCreador' => array(self::BELONGS_TO, 'Usuario', 'usuario_creador'),
            'estadoPresentacion' => array(self::BELONGS_TO, 'Estado', 'estado_presentacion'),
            'adjunto0' => array(self::BELONGS_TO, 'Adjunto', 'adjunto'),
            'idCampus' => array(self::BELONGS_TO, 'Campus', 'id_campus'),
            'propuestaInscritas' => array(self::HAS_MANY, 'PropuestaInscrita', 'id_propuesta'),
            'procesos' => array(self::MANY_MANY, 'Proceso', 'propuesta_reutilizada(id_propuesta, id_proceso)'),
            'proyecto0' => array(self::BELONGS_TO, 'Proyecto', 'id_propuesta'),
            'proyectos' => array(self::HAS_MANY, 'Proyecto', 'id_propuesta'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_propuesta' => 'Código',
            'id_propuesta_padre' => 'Propuesta Padre',
            'estado' => 'Estado Actual',
            'prof_co_guia' => 'Profesor Co-Guía',
            'estado_presentacion' => 'Estado en la presentación',
            'titulo' => 'Título',
            'descripcion' => 'Descripción',
            'usuario_creador' => 'Creador',
            'fecha_creacion' => 'Fecha Creación',
            'fecha_resolucion' => 'Fecha Resolución',
            'fecha_resolucion_presentacion' => 'Fecha Resolución Presentación',
            'fecha_presentacion' => 'Fecha Presentación',
            'fecha_presenta_propuesta' => 'Fecha de envio a revisión',
            'id_proceso' => 'Periodo',
            'observaciones' => 'Observaciones',
            'objetivos' => 'Objetivo General',
            'objetivos_especificos' => 'Objetivos Específicos',
            'plan_trabajo' => 'Plan de Trabajo',
            'justificacion' => 'Justificación',
            'adjunto' => 'Adjunto',
            'metodologia' => 'Metodología',
            'trabajos_simi' => 'Trabajos Similares',
            'bibliografia' => 'Bibliografía',
            'nombre_empresa' => 'Nombre de la Empresa',
            'nombre_responsable' => 'Nombre del Responsable',
            'cargo_responsable' => 'Cargo del Responsable',
            'cant_participantes' => 'Cantidad de Participantes',
            'comentarios' => 'Comentarios',
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

        $criteria->compare('id_propuesta', $this->id_propuesta);
        // $criteria->compare('id_propuesta_padre',NULL);
        $criteria->compare('estado', $this->estado);
        $criteria->compare('estado_presentacion', $this->estado_presentacion);
        $criteria->compare('titulo', $this->titulo, true);
        $criteria->compare('descripcion', $this->descripcion, true);
        $criteria->compare('usuario_creador', $this->usuario_creador);
        $criteria->compare('fecha_creacion', $this->fecha_creacion, true);
        $criteria->compare('fecha_resolucion', $this->fecha_resolucion, true);
        $criteria->compare('fecha_resolucion_presentacion', $this->fecha_resolucion_presentacion, true);
        $criteria->compare('fecha_presentacion', $this->fecha_presentacion, true);
        $criteria->compare('fecha_presenta_propuesta', $this->fecha_presenta_propuesta, true);
        $criteria->compare('id_proceso', $this->id_proceso);
        $criteria->compare('observaciones', $this->observaciones, true);
        $criteria->compare('objetivos', $this->objetivos, true);
        $criteria->compare('plan_trabajo', $this->plan_trabajo, true);
        $criteria->compare('justificacion', $this->justificacion, true);
        $criteria->compare('adjunto', $this->adjunto);
        $criteria->compare('metodologia', $this->metodologia, true);
        $criteria->compare('trabajos_simi', $this->trabajos_simi, true);
        $criteria->compare('bibliografia', $this->bibliografia, true);
        $criteria->compare('nombre_empresa', $this->nombre_empresa, true);
        $criteria->compare('nombre_responsable', $this->nombre_responsable, true);
        $criteria->compare('cargo_responsable', $this->cargo_responsable, true);
        $criteria->compare('cant_participantes', $this->cant_participantes);
        $criteria->compare('comentarios', $this->comentarios, true);
        $criteria->addCondition('id_propuesta_padre IS NULL');
        $criteria->addCondition('id_campus=' . Yii::app()->user->getState('campus'));
        
        if ($this->nombres_alumnos != NULL) {
            $criteria->addCondition("id_propuesta in (select id_propuesta from 
            propuesta_inscrita where usuario in (select id_usuario from usuario where nombre like '%" . $this->nombres_alumnos . "%') )");
        }
        $criteria->order = "id_propuesta DESC";
        $session = new CHttpSession;
        $session->open();
        $session['resultado_filtro_propuesta'] = $criteria;
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function searchMisPropuestas() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;
        $arrayDeMisPropuestas = PropuestaInscrita::model()->findAll('usuario=:us', array('us' => Yii::app()->user->id));
        $arrayDeMisCoGuia = CoGuia::model()->findAll('id_co_guia=:us', array('us' => Yii::app()->user->id));
        $arrayIDMisPropuestas = array();
        $arrayIDCoGuia = array();
        $condicion = "id_propuesta_padre IS NULL and (usuario_creador=" . Yii::app()->user->id . " or id_propuesta in (SELECT id_propuesta 
            FROM  proyecto 
            WHERE  id_proyecto_padre is NULL and (prof_sala =" . Yii::app()->user->id . "
            OR  prof_informante =" . Yii::app()->user->id . "
            OR  prof_guia =" . Yii::app()->user->id . "))";
        foreach ($arrayDeMisPropuestas as $inscripciones) {
            $arrayIDMisPropuestas[] = $inscripciones->id_propuesta;
        }
        if (count($arrayIDMisPropuestas) > 0) {
            $condicion .= ' or id_propuesta in(' . implode(',', $arrayIDMisPropuestas) . ')';
        }
        foreach ($arrayDeMisCoGuia as $co) {
            $arrayIDCoGuia[] = $co->id_propuesta;
        }
        if (count($arrayDeMisCoGuia) > 0) {
            $condicion .= ' or id_propuesta in(' . implode(',', $arrayDeMisCoGuia) . ')';
        }
        $condicion .=")";

        $criteria->compare('id_propuesta', $this->id_propuesta);
        // $criteria->compare('id_propuesta_padre',NULL);
        $criteria->compare('estado', $this->estado);
        $criteria->compare('estado_presentacion', $this->estado_presentacion);
        $criteria->compare('titulo', $this->titulo, true);
        $criteria->compare('descripcion', $this->descripcion, true);
        $criteria->compare('usuario_creador', $this->usuario_creador);
        $criteria->compare('fecha_creacion', $this->fecha_creacion, true);
        $criteria->compare('fecha_resolucion', $this->fecha_resolucion, true);
        $criteria->compare('fecha_resolucion_presentacion', $this->fecha_resolucion_presentacion, true);
        $criteria->compare('fecha_presentacion', $this->fecha_presentacion, true);
        $criteria->compare('fecha_presenta_propuesta', $this->fecha_presenta_propuesta, true);
        $criteria->compare('id_proceso', $this->id_proceso);
        $criteria->compare('observaciones', $this->observaciones, true);
        $criteria->compare('objetivos', $this->objetivos, true);
        $criteria->compare('plan_trabajo', $this->plan_trabajo, true);
        $criteria->compare('justificacion', $this->justificacion, true);
        $criteria->compare('adjunto', $this->adjunto);
        $criteria->compare('metodologia', $this->metodologia, true);
        $criteria->compare('trabajos_simi', $this->trabajos_simi, true);
        $criteria->compare('bibliografia', $this->bibliografia, true);
        $criteria->compare('nombre_empresa', $this->nombre_empresa, true);
        $criteria->compare('nombre_responsable', $this->nombre_responsable, true);
        $criteria->compare('cargo_responsable', $this->cargo_responsable, true);
        $criteria->compare('cant_participantes', $this->cant_participantes);
        $criteria->compare('comentarios', $this->comentarios, true);
        $criteria->addCondition($condicion);
        $criteria->addCondition('id_campus=' . Yii::app()->user->getState('campus'));
        if ($this->nombres_alumnos != NULL) {
            $criteria->addCondition("id_propuesta in (select id_propuesta from 
            propuesta_inscrita where usuario in (select id_usuario from usuario where nombre like '%" . $this->nombres_alumnos . "%') )");
        }
        $criteria->order = "id_propuesta DESC";
        $session = new CHttpSession;
        $session->open();
        $session['resultado_filtro_propuesta'] = $criteria;
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function beforeSave() {
        if ($this->isNewRecord) {
            $this->fecha_creacion = new CDbExpression('NOW()');
        } else {
            $newDate = DateTime::createFromFormat('d/m/Y', $this->fecha_creacion);
            if ($newDate != null)
                $this->fecha_creacion = $newDate->format('Y-m-d');
            else
                $this->fecha_creacion = NULL;
            $newDate2 = DateTime::createFromFormat('d/m/Y', $this->fecha_presenta_propuesta);
            if ($newDate2 != null)
                $this->fecha_presenta_propuesta = $newDate2->format('Y-m-d');
            else
                $this->fecha_presenta_propuesta = null;
            $newDate3 = DateTime::createFromFormat('d/m/Y H:i', $this->fecha_presentacion);
            if ($newDate3 != null)
                $this->fecha_presentacion = $newDate3->format('Y-m-d H:i:s');
            else
                $this->fecha_presentacion = NULL;

            $newDate4 = DateTime::createFromFormat('d/m/Y', $this->fecha_resolucion);
            if ($newDate4 != null)
                $this->fecha_resolucion = $newDate4->format('Y-m-d');
            else
                $this->fecha_resolucion = NULL;

            $newDate5 = DateTime::createFromFormat('d/m/Y', $this->fecha_resolucion_presentacion);
            if ($newDate5 != null)
                $this->fecha_resolucion_presentacion = $newDate5->format('Y-m-d');
            else
                $this->fecha_resolucion_presentacion = NULL;

            $propuesta = Propuesta::model()->findByPk($this->id_propuesta);
            $propuesta->id_propuesta_padre = $this->id_propuesta;
            $propuesta->id_propuesta = null;
            $propuesta->isNewRecord = TRUE;
            $propuesta->save();
        }
        //$this->modified = new CDbExpression('NOW()');
        return parent::beforeSave();
    }

    protected function afterFind() {
        // convert to display format
        $this->fecha_creacion != NULL ? $this->fecha_creacion = Yii::app()->dateFormatter->format("dd/MM/y", strtotime($this->fecha_creacion)) : '';
        $this->fecha_presenta_propuesta != NULL ? $this->fecha_presenta_propuesta = Yii::app()->dateFormatter->format("dd/MM/y", strtotime($this->fecha_presenta_propuesta)) : '';
        $this->fecha_presentacion != NULL ? $this->fecha_presentacion = Yii::app()->dateFormatter->format("dd/MM/y HH:mm", strtotime($this->fecha_presentacion)) : '';
        $this->fecha_resolucion != NULL ? $this->fecha_resolucion = Yii::app()->dateFormatter->format("dd/MM/y", strtotime($this->fecha_resolucion)) : '';
        $this->fecha_resolucion_presentacion != NULL ? $this->fecha_resolucion_presentacion = Yii::app()->dateFormatter->format("dd/MM/y", strtotime($this->fecha_resolucion_presentacion)) : '';
        parent::afterFind();
    }

    protected function beforeDelete() {
        foreach ($this->propuestaInscritas as $p) {
            $p->delete();
        }
        if ($this->adjunto0 != NULL)
            $this->adjunto0->delete();
        if ($this->proyecto0 != NULL) {
            
        }
        $propuestasHijo = Propuesta::model()->findAll('id_propuesta_padre=' . $this->id_propuesta);
        foreach ($propuestasHijo as $pro) {
            $pro->delete();
        }
        return parent::beforeDelete();
    }

    public function validaEnResolucion($attribute, $params = null) {
        if ($this->estadoDeAceptacion() && $attribute == 'profesor_guia' && $this->scenario == 'resolucion') {
            if ($this->profesor_guia == NULL) {
                $this->addError('profesor_guia', 'Debe asignar un profesor guía');
            }
            if ($this->estado == Estado::$PROPUESTA_ACEPTADA_CON_OBSERVACIONES_CON_PRESENTACION) {
                if ($this->fecha_presentacion == NULL) {
                    $this->addError('fecha_presentacion', 'Debe asignar una fecha para la presentación');
                }
            }
        }
    }

    public function estadoDeAceptacion() {
        return $this->estado == Estado::$PROPUESTA_ACEPTADA ||
                $this->estado == Estado::$PROPUESTA_ACEPTADA_CON_OBSERVACIONES_CON_PRESENTACION ||
                $this->estado == Estado::$PROPUESTA_ACEPTADA_CON_OBSERVACIONES_SIN_PRESENTACION;
    }

    public function estadoDeAceptacionTotal() {
        return $this->estado == Estado::$PROPUESTA_ACEPTADA ||
                ( $this->estado == Estado::$PROPUESTA_ACEPTADA_CON_OBSERVACIONES_CON_PRESENTACION && $this->estado_presentacion == Estado::$PRESENTACION_ACEPTADA) ||
                $this->estado == Estado::$PROPUESTA_ACEPTADA_CON_OBSERVACIONES_SIN_PRESENTACION;
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