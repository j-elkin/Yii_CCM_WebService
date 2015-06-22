<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_area".
 *
 * @property integer $idtipo_area
 * @property string $tipo_area
 *
 * @property Evento[] $eventos
 */
class TipoArea extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_area';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_area'], 'required'],
            [['idtipo_area'], 'integer'],
            [['tipo_area'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idtipo_area' => 'ID del Area',
            'tipo_area' => 'Tipo Area',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventos()
    {
        return $this->hasMany(Evento::className(), ['tipo_area_idtipo_area' => 'idtipo_area']);
    }
}
