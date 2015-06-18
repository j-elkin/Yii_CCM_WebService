<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "memoria".
 *
 * @property integer $idmemoria
 * @property string $nombre
 * @property string $descripcion
 * @property resource $archivo
 * @property integer $evento_idevento
 *
 * @property Evento $eventoIdevento
 */
class Memoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'memoria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idmemoria', 'nombre', 'archivo', 'evento_idevento'], 'required'],
            [['idmemoria', 'evento_idevento'], 'integer'],
            [['archivo'], 'string'],
            [['nombre', 'descripcion'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idmemoria' => 'Idmemoria',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'archivo' => 'Archivo',
            'evento_idevento' => 'Evento Idevento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventoIdevento()
    {
        return $this->hasOne(Evento::className(), ['idevento' => 'evento_idevento']);
    }
}
