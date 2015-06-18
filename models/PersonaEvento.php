<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "per_evt".
 *
 * @property integer $evento_idevento
 * @property integer $persona_idpersona
 *
 * @property Evento $eventoIdevento
 * @property Persona $personaIdpersona
 */
class PersonaEvento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'per_evt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['evento_idevento', 'persona_idpersona'], 'required'],
            [['evento_idevento', 'persona_idpersona'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'evento_idevento' => 'Evento Idevento',
            'persona_idpersona' => 'Persona Idpersona',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventoIdevento()
    {
        return $this->hasOne(Evento::className(), ['idevento' => 'evento_idevento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonaIdpersona()
    {
        return $this->hasOne(Persona::className(), ['docPersona' => 'persona_idpersona']);
    }
}
