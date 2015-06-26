<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "almuerzo".
 *
 * @property integer $idAlmuerzo
 * @property string $fecha
 * @property string $hora
 * @property integer $persona_docPersona
 *
 * @property Persona $personaDocPersona
 */
class Almuerzo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'almuerzo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'hora', 'persona_docPersona'], 'required'],
            [['fecha', 'hora'], 'safe'],
            [['persona_docPersona'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idAlmuerzo' => 'N° Almuerzo',
            'fecha' => 'Fecha',
            'hora' => 'Hora',
            'persona_docPersona' => 'Documento Persona',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonaDocPersona()
    {
        return $this->hasOne(Persona::className(), ['docPersona' => 'persona_docPersona']);
    }
}
