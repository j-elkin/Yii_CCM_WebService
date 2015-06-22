<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_evento".
 *
 * @property integer $idtipo_evento
 * @property string $tipo_evento
 *
 * @property Evento[] $eventos
 */
class TipoEvento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_evento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_evento'], 'required'],
            [['idtipo_evento'], 'integer'],
            [['tipo_evento'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idtipo_evento' => 'ID Tipo Evento',
            'tipo_evento' => 'Tipo Evento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventos()
    {
        return $this->hasMany(Evento::className(), ['tipo_evento_idtipo_evento' => 'idtipo_evento']);
    }
}
