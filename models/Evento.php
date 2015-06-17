<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "evento".
 *
 * @property integer $idevento
 * @property string $nombre
 * @property string $descripcion
 * @property integer $tipo_evento_idtipo_evento
 * @property integer $CCM_idCCM
 * @property integer $tipo_area_idtipo_area
 *
 * @property Ccm $cCMIdCCM
 * @property TipoArea $tipoAreaIdtipoArea
 * @property TipoEvento $tipoEventoIdtipoEvento
 * @property Memoria[] $memorias
 * @property PerEvt[] $perEvts
 * @property Persona[] $personaIdpersonas
 * @property Ubicacion[] $ubicacions
 */
class Evento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'evento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idevento', 'tipo_evento_idtipo_evento', 'CCM_idCCM', 'tipo_area_idtipo_area'], 'required'],
            [['idevento', 'tipo_evento_idtipo_evento', 'CCM_idCCM', 'tipo_area_idtipo_area'], 'integer'],
            [['nombre', 'descripcion'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idevento' => 'Idevento',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'tipo_evento_idtipo_evento' => 'Tipo Evento Idtipo Evento',
            'CCM_idCCM' => 'Ccm Id Ccm',
            'tipo_area_idtipo_area' => 'Tipo Area Idtipo Area',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCCMIdCCM()
    {
        return $this->hasOne(Ccm::className(), ['idCCM' => 'CCM_idCCM']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoAreaIdtipoArea()
    {
        return $this->hasOne(TipoArea::className(), ['idtipo_area' => 'tipo_area_idtipo_area']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoEventoIdtipoEvento()
    {
        return $this->hasOne(TipoEvento::className(), ['idtipo_evento' => 'tipo_evento_idtipo_evento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMemorias()
    {
        return $this->hasMany(Memoria::className(), ['evento_idevento' => 'idevento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerEvts()
    {
        return $this->hasMany(PerEvt::className(), ['evento_idevento' => 'idevento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonaIdpersonas()
    {
        return $this->hasMany(Persona::className(), ['docPersona' => 'persona_idpersona'])->viaTable('per_evt', ['evento_idevento' => 'idevento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUbicacions()
    {
        return $this->hasMany(Ubicacion::className(), ['evento_idevento' => 'idevento']);
    }
}
