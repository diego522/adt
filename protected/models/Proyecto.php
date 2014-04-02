<?php

/**
 * This is the model class for table "proyecto".
 *
 * The followings are the available columns in table 'proyecto':
 * @property integer $id_proyecto
 * @property integer $id_proyecto_padre
 * @property integer $estado_actual
 * @property integer $estado_avance 
 * @property integer $apoyo_disenador 
 * @property integer $carta_compromiso 
 * @property integer $estado_avance 
 * @property string $fecha_creacion
 * @property string $comentario_guia
 * @property string $comentario_informante
 * @property string $comentario_reprobacion
 * 
 * @property string $fecha_guia_notif_jefe_carr
 * @property string $fecha_defensa
 * @property string $fecha_real_entrega_rev_informante
 * @property string $fecha_max_rev_informante
 * @property string $fecha_entrega_a_informante
 * @property string $fecha_asigna_informante
 * @property string $fecha_ultima_actualizacion
 * @property string $fecha_reprobacion
 * @property string $fecha_entrega_cd
 * @property string $fecha_entrega_empaste
 * @property string $tipo_financiamiento
 * 
 * @property string $fecha_fin
 * @property integer $prof_guia
 * @property integer $prof_informante
 * @property integer $prof_sala
 * @property integer $id_propuesta
 * @property string $fecha_inicio
 * @property integer $calif_defensa_guia
 * @property integer $calif_defensa_info
 * @property integer $calif_defensa_sala
 * @property integer $calif_guia
 * @property integer $calif_informante
 * @property integer $carta_aceptacion
 * @property integer $financiado
 *
 * The followings are the available model relations:
 * @property Avance[] $avances
 * @property EvaluacionDefensaGuia[] $evaluacionesDefensaGuia
 * @property EvaluacionDefensaSala[] $evaluacionesDefensaSala
 * @property EvaluacionDefensaInformante[] $evaluacionesDefensaInformate
 * @property EvaluacionProyectoGuia[] $evaluacionesProyectoGuia
 * @property EvaluacionProyectoInformante[] $evaluacionesProyectoInformante
 * @property Defensa[] $defensas
 * @property Correccion[] $correccions
 * @property Planificacion[] $planificacions
 * @property Estado $estadoActual
 * @property Estado $estadoAvance
 * @property Propuesta $idPropuesta
 * @property Usuario $profGuia
 * @property Usuario $profInformante
 * @property Usuario $profSala
 * @property Solicitud[] $solicituds
 */
class Proyecto extends CActiveRecord {

    public $nombres_alumnos;
    public $periodo;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Proyecto the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'proyecto';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('fecha_creacion, id_propuesta', 'required'),
            array('estado_avance,estado_actual,fecha_fin,fecha_inicio,prof_guia', 'required', 'on' => 'actualiza'),
            array('estado_actual, prof_guia, prof_informante, prof_sala, id_propuesta', 'numerical', 'integerOnly' => true),
            array('apoyo_disenador,carta_aceptacion,financiado,tipo_financiamiento,fecha_entrega_empaste,fecha_entrega_cd,carta_compromiso,comentario_guia,comentario_informante,fecha_reprobacion,comentario_reprobacion,', 'safe'),
            array('prof_sala', 'required', 'on' => 'creaDefensa'),
            array('fecha_entrega_a_informante', 'required', 'on' => 'informateRetiraProyecto'),
            array('fecha_max_rev_informante,prof_informante', 'required', 'on' => 'asignaInformante'),
            array('comentario_reprobacion', 'required', 'on' => 'reprueba'),
            array('calif_defensa_guia, calif_defensa_info, calif_defensa_sala, calif_guia, calif_informante', 'numerical',),
            array('fecha_fin, fecha_inicio,fecha_guia_notif_jefe_carr,fecha_defensa,fecha_real_entrega_rev_informante,fecha_max_rev_informante,fecha_entrega_a_informante,fecha_asigna_informante,fecha_ultima_actualizacion', 'safe'),
            array('id_proyecto, nombres_alumnos,periodo,estado_actual,apoyo_disenador,carta_compromiso, estado_avance,fecha_creacion, fecha_fin, prof_guia, prof_informante, prof_sala, id_propuesta, fecha_inicio, calif_defensa_guia, calif_defensa_info, calif_defensa_sala, calif_guia, calif_informante', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'avances' => array(self::HAS_MANY, 'Avance', 'id_proyecto'),
            'correccions' => array(self::HAS_MANY, 'Correccion', 'id_proyecto'),
            'defensas' => array(self::HAS_MANY, 'Defensa', 'id_proyecto'),
            'empresaProyectos' => array(self::HAS_MANY, 'EmpresaProyecto', 'id_proyecto'),
            'evaluacionDefensaGuias' => array(self::HAS_MANY, 'EvaluacionDefensaGuia', 'id_proyecto'),
            'evaluacionDefensaInformantes' => array(self::HAS_MANY, 'EvaluacionDefensaInformante', 'id_proyecto'),
            'evaluacionDefensaSalas' => array(self::HAS_MANY, 'EvaluacionDefensaSala', 'id_proyecto'),
            'evaluacionProyectoGuias' => array(self::HAS_MANY, 'EvaluacionProyectoGuia', 'id_proyecto'),
            'evaluacionProyectoInformantes' => array(self::HAS_MANY, 'EvaluacionProyectoInformante', 'id_proyecto'),
            'planificacions' => array(self::HAS_MANY, 'Planificacion', 'id_proyecto'),
            'estadoActual' => array(self::BELONGS_TO, 'Estado', 'estado_actual'),
            'idPropuesta' => array(self::BELONGS_TO, 'Propuesta', 'id_propuesta'),
            'profGuia' => array(self::BELONGS_TO, 'Usuario', 'prof_guia'),
            'profInformante' => array(self::BELONGS_TO, 'Usuario', 'prof_informante'),
            'profSala' => array(self::BELONGS_TO, 'Usuario', 'prof_sala'),
            'estadoAvance' => array(self::BELONGS_TO, 'Estado', 'estado_avance'),
            'idProyectoPadre' => array(self::BELONGS_TO, 'Proyecto', 'id_proyecto_padre'),
            'proyectos' => array(self::HAS_MANY, 'Proyecto', 'id_proyecto_padre'),
            'solicituds' => array(self::HAS_MANY, 'Solicitud', 'id_proyecto'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_proyecto' => 'Código',
            'id_proyecto_padre' => 'Proyecto Padre',
            'comentario_guia' => 'Comentarios Profesor Guía',
            'comentario_informante' => 'Comentarios Profesor Informante',
            'estado_actual' => 'Estado actual',
            'comentario_reprobacion' => 'Comentarios de la Reprobación',
            'fecha_reprobacion' => 'Fecha de la reprobación',
            'carta_compromiso' => 'Carta de Compromiso',
            'apoyo_disenador' => 'Apoyo de Diseñador',
            'carta_aceptacion' => 'Carta de Aceptación',
            'estado_actual' => 'Estado Actual',
            'estado_avance' => 'Etapa de Avance',
            'fecha_creacion' => 'Fecha de Creacion',
            'fecha_entrega_cd' => 'Fecha de Entrega de DVD ',
            'fecha_entrega_empaste' => 'Fecha de Entrega Informe Empastado',
            'fecha_creacion' => 'Fecha de Creacion',
            'fecha_guia_notif_jefe_carr' => 'Fecha de Término (real)',
            'fecha_defensa' => 'Fecha de Defensa',
            'fecha_real_entrega_rev_informante' => 'Fecha real de entrega de revisión profesor informante',
            'fecha_max_rev_informante' => 'Plazo máximo para entrega de revisión profesor informante',
            'fecha_entrega_a_informante' => 'Fecha de entrega del informe al profesor informante',
            'fecha_ultima_actualizacion' => 'Fecha de última actualización',
            'fecha_asigna_informante' => 'Fecha de asignación de Profesor Informante',
            'prof_guia' => 'Profesor Guía',
            'fecha_fin' => 'Fecha de Término (estimada)',
            'prof_informante' => 'Profesor Informante',
            'prof_sala' => 'Profesor de Sala',
            'id_propuesta' => 'Código de Propuesta',
            'fecha_inicio' => 'Fecha de Inicio',
            'calif_defensa_guia' => 'Calificación  Prof. Guia',
            'calif_defensa_info' => 'Calificación Prof. Informante',
            'calif_defensa_sala' => 'Calificación Sala',
            'calif_guia' => 'Calificación Prof. Guia',
            'calif_informante' => 'Calificación Prof. Informante',
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

        $criteria->compare('id_proyecto', $this->id_proyecto);
        $criteria->compare('estado_actual', $this->estado_actual);
        $criteria->compare('apoyo_disenador', $this->apoyo_disenador);
        $criteria->compare('carta_compromiso', $this->carta_compromiso);
        $criteria->compare('estado_avance', $this->estado_avance);
        $criteria->compare('fecha_creacion', $this->fecha_creacion, true);
        $criteria->compare('fecha_fin', $this->fecha_fin, true);
        $criteria->compare('prof_guia', $this->prof_guia);
        $criteria->compare('prof_informante', $this->prof_informante);
        $criteria->compare('prof_sala', $this->prof_sala);
        $criteria->compare('id_propuesta', $this->id_propuesta);
        $criteria->compare('financiado', $this->financiado);
        $criteria->compare('fecha_inicio', $this->fecha_inicio, true);
        $criteria->compare('calif_defensa_guia', $this->calif_defensa_guia);
        $criteria->compare('calif_defensa_info', $this->calif_defensa_info);
        $criteria->compare('calif_defensa_sala', $this->calif_defensa_sala);
        $criteria->compare('calif_guia', $this->calif_guia);
        $criteria->compare('calif_informante', $this->calif_informante);
        $criteria->addCondition('id_proyecto_padre IS NULL');
        $criteria->addCondition('id_propuesta in (select id_propuesta from 
            propuesta where id_campus=' . Yii::app()->user->getState('campus') . ')');
        if ($this->periodo != NULL) {
            $criteria->addCondition('id_propuesta in (select id_propuesta from 
            propuesta where id_proceso=' . $this->periodo . ')');
        }
        if ($this->nombres_alumnos != NULL) {
            $criteria->addCondition("id_propuesta in (select id_propuesta from 
            propuesta_inscrita where usuario in (select id_usuario from usuario where nombre like '%" . $this->nombres_alumnos . "%') )");
        }
        $criteria->order = "id_proyecto DESC";
        $session = new CHttpSession;
        $session->open();
        $session['resultado_filtro_proyecto'] = $criteria;
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function searchMisProyectos() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $participaciones = PropuestaInscrita::model()->findAll('usuario=:idu', array(':idu' => Yii::app()->user->id));
        $arrayDeMisCoGuia = CoGuia::model()->findAll('id_co_guia=:us', array('us' => Yii::app()->user->id));
        $arrayPropuestas = array();
        $condicion = 'id_proyecto_padre is NULL and (';
        if (count($participaciones) > 0) {
            foreach ($participaciones as $p) {
                $arrayPropuestas[] = $p->id_propuesta;
            }
        }
        if (count($arrayDeMisCoGuia) > 0) {
            foreach ($arrayDeMisCoGuia as $c) {
                $arrayPropuestas[] = $c->id_propuesta;
            }
        }
        if (count($arrayDeMisCoGuia) > 0 || count($participaciones) > 0)
            $condicion.=' id_propuesta in (' . implode(',', $arrayPropuestas) . ') or';
        $condicion.="  prof_guia=" . Yii::app()->user->id . " or prof_informante=" . Yii::app()->user->id . " or prof_sala=" . Yii::app()->user->id . ")";
        $criteria->compare('id_proyecto', $this->id_proyecto);
        $criteria->compare('estado_actual', $this->estado_actual);
        $criteria->compare('apoyo_disenador', $this->apoyo_disenador);
        $criteria->compare('carta_compromiso', $this->carta_compromiso);
        $criteria->compare('estado_avance', $this->estado_avance);
        $criteria->compare('prof_guia', $this->prof_guia);
        $criteria->compare('prof_informante', $this->prof_informante);
        $criteria->compare('financiado', $this->financiado);
        $criteria->compare('prof_sala', $this->prof_sala);
        $criteria->addCondition($condicion);
        $criteria->addCondition('id_propuesta in (select id_propuesta from 
            propuesta where id_campus=' . Yii::app()->user->getState('campus') . ')');
        if ($this->periodo != NULL) {
            $criteria->addCondition('id_propuesta in (select id_propuesta from 
            propuesta where id_proceso=' . $this->periodo . ')');
        }
        if ($this->nombres_alumnos != NULL) {
            $criteria->addCondition("id_propuesta in (select id_propuesta from 
            propuesta_inscrita where usuario in (select id_usuario from usuario where nombre like '%" . $this->nombres_alumnos . "%') )");
        }
        $criteria->order = "id_proyecto DESC";
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
        }
        $newDate2 = DateTime::createFromFormat('d/m/Y', $this->fecha_fin);
        if ($newDate2 != null)
            $this->fecha_fin = $newDate2->format('Y-m-d');
        else
            $this->fecha_fin = NULL;

        $newDate3 = DateTime::createFromFormat('d/m/Y', $this->fecha_inicio);
        if ($newDate3 != null)
            $this->fecha_inicio = $newDate3->format('Y-m-d');
        else
            $this->fecha_inicio = NULL;

        $newDate4 = DateTime::createFromFormat('d/m/Y', $this->fecha_asigna_informante);
        if ($newDate4 != null)
            $this->fecha_asigna_informante = $newDate4->format('Y-m-d');
        else
            $this->fecha_asigna_informante = NULL;

        $newDate5 = DateTime::createFromFormat('d/m/Y H:i', $this->fecha_defensa);
        if ($newDate5 != null)
            $this->fecha_defensa = $newDate5->format('Y-m-d H:i:s');
        else
            $this->fecha_defensa = NULL;

        $newDate6 = DateTime::createFromFormat('d/m/Y H:i', $this->fecha_entrega_a_informante);
        if ($newDate6 != null)
            $this->fecha_entrega_a_informante = $newDate6->format('Y-m-d H:i:s');
        else
            $this->fecha_entrega_a_informante = NULL;

        $newDate7 = DateTime::createFromFormat('d/m/Y', $this->fecha_guia_notif_jefe_carr);
        if ($newDate7 != null)
            $this->fecha_guia_notif_jefe_carr = $newDate7->format('Y-m-d');
        else
            $this->fecha_guia_notif_jefe_carr = NULL;

        $newDate8 = DateTime::createFromFormat('d/m/Y', $this->fecha_max_rev_informante);
        if ($newDate8 != null)
            $this->fecha_max_rev_informante = $newDate8->format('Y-m-d');
        else
            $this->fecha_max_rev_informante = NULL;

        $newDate9 = DateTime::createFromFormat('d/m/Y', $this->fecha_real_entrega_rev_informante);
        if ($newDate9 != null)
            $this->fecha_real_entrega_rev_informante = $newDate9->format('Y-m-d');
        else
            $this->fecha_real_entrega_rev_informante = NULL;

        $newDate10 = DateTime::createFromFormat('d/m/Y', $this->fecha_reprobacion);
        if ($newDate10 != null)
            $this->fecha_reprobacion = $newDate10->format('Y-m-d');
        else
            $this->fecha_reprobacion = NULL;

        $newDate11 = DateTime::createFromFormat('d/m/Y', $this->fecha_entrega_cd);
        if ($newDate11 != null)
            $this->fecha_entrega_cd = $newDate11->format('Y-m-d');
        else
            $this->fecha_entrega_cd = NULL;

        $newDate12 = DateTime::createFromFormat('d/m/Y', $this->fecha_entrega_empaste);
        if ($newDate12 != null)
            $this->fecha_entrega_empaste = $newDate12->format('Y-m-d');
        else
            $this->fecha_entrega_empaste = NULL;

        $this->fecha_ultima_actualizacion = new CDbExpression('NOW()');

        /* HISTORIAL */
        if (!$this->isNewRecord) {
            $proyecto = Proyecto::model()->findByPk($this->id_proyecto);
            $proyecto->id_proyecto_padre = $this->id_proyecto;
            $proyecto->id_proyecto = null;
            $proyecto->isNewRecord = TRUE;
            $proyecto->save();
        }

        //$this->modified = new CDbExpression('NOW()');
        return parent::beforeSave();
    }

    protected function afterFind() {
        // convert to display format
        $this->fecha_creacion != NULL ? $this->fecha_creacion = Yii::app()->dateFormatter->format("dd/MM/y", strtotime($this->fecha_creacion)) : '';
        $this->fecha_fin != NULL ? $this->fecha_fin = Yii::app()->dateFormatter->format("dd/MM/y", strtotime($this->fecha_fin)) : '';
        $this->fecha_inicio != NULL ? $this->fecha_inicio = Yii::app()->dateFormatter->format("dd/MM/y", strtotime($this->fecha_inicio)) : '';
        $this->fecha_asigna_informante != NULL ? $this->fecha_asigna_informante = Yii::app()->dateFormatter->format("dd/MM/y", strtotime($this->fecha_asigna_informante)) : '';
        $this->fecha_defensa != NULL ? $this->fecha_defensa = Yii::app()->dateFormatter->format("dd/MM/y HH:mm", strtotime($this->fecha_defensa)) : '';
        $this->fecha_entrega_a_informante != NULL ? $this->fecha_entrega_a_informante = Yii::app()->dateFormatter->format("dd/MM/y HH:mm", strtotime($this->fecha_entrega_a_informante)) : '';
        $this->fecha_guia_notif_jefe_carr != NULL ? $this->fecha_guia_notif_jefe_carr = Yii::app()->dateFormatter->format("dd/MM/y", strtotime($this->fecha_guia_notif_jefe_carr)) : '';
        $this->fecha_max_rev_informante != NULL ? $this->fecha_max_rev_informante = Yii::app()->dateFormatter->format("dd/MM/y", strtotime($this->fecha_max_rev_informante)) : '';
        $this->fecha_real_entrega_rev_informante != NULL ? $this->fecha_real_entrega_rev_informante = Yii::app()->dateFormatter->format("dd/MM/y", strtotime($this->fecha_real_entrega_rev_informante)) : '';
        $this->fecha_ultima_actualizacion != NULL ? $this->fecha_ultima_actualizacion = Yii::app()->dateFormatter->format("dd/MM/y HH:mm", strtotime($this->fecha_ultima_actualizacion)) : '';
        $this->fecha_reprobacion != NULL ? $this->fecha_reprobacion = Yii::app()->dateFormatter->format("dd/MM/y", strtotime($this->fecha_reprobacion)) : '';
        $this->fecha_entrega_cd != NULL ? $this->fecha_entrega_cd = Yii::app()->dateFormatter->format("dd/MM/y", strtotime($this->fecha_entrega_cd)) : '';
        $this->fecha_entrega_empaste != NULL ? $this->fecha_entrega_empaste = Yii::app()->dateFormatter->format("dd/MM/y", strtotime($this->fecha_entrega_empaste)) : '';
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

    protected function beforeDelete() {
        foreach ($this->correccions as $c) {
            $c->delete();
        }
        foreach ($this->avances as $c) {
            $c->delete();
        }
        foreach ($this->defensas as $c) {
            $c->delete();
        }
    }

}