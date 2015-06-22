<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_persona".
 *
 * @property integer $idtipo_persona
 * @property string $tipo_persona
 *
 * @property Persona[] $personas
 */
class TipoPersona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_persona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_persona'], 'required'],
            [['idtipo_persona'], 'integer'],
            [['tipo_persona'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idtipo_persona' => 'ID del Tipo Persona',
            'tipo_persona' => 'Tipo Persona',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['tipo_persona_idtipo_persona' => 'idtipo_persona']);
    }
}
