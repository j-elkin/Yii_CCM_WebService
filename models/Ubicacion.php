<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ubicacion".
 *
 * @property integer $idubicacion
 * @property string $hora_inicio
 * @property string $hora_fin
 * @property string $lugar
 * @property string $fecha
 * @property integer $evento_idevento
 *
 * @property Evento $eventoIdevento
 */
class Ubicacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ubicacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hora_inicio', 'hora_fin', 'lugar', 'evento_idevento', 'limite_cupos'], 'required'],
            [['idubicacion', 'evento_idevento', 'limite_cupos'], 'integer'],
            [['hora_inicio', 'hora_fin', 'fecha'], 'safe'],
            [['lugar'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idubicacion' => 'ID Ubicación',
            'hora_inicio' => 'Hora Inicio',
            'hora_fin' => 'Hora Fin',
            'lugar' => 'Lugar',
            'fecha' => 'Fecha',
            'evento_idevento' => 'Evento',
            'limite_cupos' => 'Limite de cupos',
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
