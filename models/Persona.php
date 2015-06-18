<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "persona".
 *
 * @property integer $docPersona
 * @property string $nombre
 * @property string $apellidos
 * @property string $genero
 * @property string $fecha_nacimiento
 * @property string $correo_electronico
 * @property string $telefono
 * @property resource $codigo_qr
 * @property integer $tipo_doc_idtipo_doc
 * @property integer $pais_procedencia_idpais_procedencia
 * @property integer $institucion_idinstitucion
 * @property integer $tipo_persona_idtipo_persona
 *
 * @property Almuerzo[] $almuerzos
 * @property PerEvt[] $perEvts
 * @property Evento[] $eventoIdeventos
 * @property Institucion $institucionIdinstitucion
 * @property PaisProcedencia $paisProcedenciaIdpaisProcedencia
 * @property TipoDoc $tipoDocIdtipoDoc
 * @property TipoPersona $tipoPersonaIdtipoPersona
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'persona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['docPersona', 'nombre', 'apellidos', 'genero', 'fecha_nacimiento', 'correo_electronico', 'tipo_doc_idtipo_doc', 'pais_procedencia_idpais_procedencia', 'institucion_idinstitucion', 'tipo_persona_idtipo_persona'], 'required'],
            [['docPersona', 'tipo_doc_idtipo_doc', 'pais_procedencia_idpais_procedencia', 'institucion_idinstitucion', 'tipo_persona_idtipo_persona'], 'integer'],
            [['codigo_qr'], 'string'],
            [['nombre', 'apellidos', 'genero', 'fecha_nacimiento', 'correo_electronico', 'telefono'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'docPersona' => 'Doc Persona',
            'nombre' => 'Nombre',
            'apellidos' => 'Apellidos',
            'genero' => 'Genero',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'correo_electronico' => 'Correo Electronico',
            'telefono' => 'Telefono',
            'codigo_qr' => 'Codigo Qr',
            'tipo_doc_idtipo_doc' => 'Tipo Doc Idtipo Doc',
            'pais_procedencia_idpais_procedencia' => 'Pais Procedencia Idpais Procedencia',
            'institucion_idinstitucion' => 'Institucion Idinstitucion',
            'tipo_persona_idtipo_persona' => 'Tipo Persona Idtipo Persona',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlmuerzos()
    {
        return $this->hasMany(Almuerzo::className(), ['persona_docPersona' => 'docPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerEvts()
    {
        return $this->hasMany(PerEvt::className(), ['persona_idpersona' => 'docPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventoIdeventos()
    {
        return $this->hasMany(Evento::className(), ['idevento' => 'evento_idevento'])->viaTable('per_evt', ['persona_idpersona' => 'docPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstitucionIdinstitucion()
    {
        return $this->hasOne(Institucion::className(), ['idinstitucion' => 'institucion_idinstitucion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaisProcedenciaIdpaisProcedencia()
    {
        return $this->hasOne(PaisProcedencia::className(), ['idpais_procedencia' => 'pais_procedencia_idpais_procedencia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoDocIdtipoDoc()
    {
        return $this->hasOne(TipoDoc::className(), ['idtipo_doc' => 'tipo_doc_idtipo_doc']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoPersonaIdtipoPersona()
    {
        return $this->hasOne(TipoPersona::className(), ['idtipo_persona' => 'tipo_persona_idtipo_persona']);
    }
}
