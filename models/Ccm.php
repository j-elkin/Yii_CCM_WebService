<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ccm".
 *
 * @property integer $idCCM
 * @property string $ciudad
 * @property string $direccion
 * @property string $telefono
 * @property string $fecha_inicio
 * @property string $fecha_fin
 *
 * @property Evento[] $eventos
 */
class Ccm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ccm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idCCM', 'ciudad', 'direccion', 'telefono', 'fecha_inicio', 'fecha_fin'], 'required'],
            [['idCCM'], 'integer'],
            [['fecha_inicio', 'fecha_fin'], 'safe'],
            [['ciudad', 'direccion', 'telefono'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCCM' => 'Id Ccm',
            'ciudad' => 'Ciudad',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_fin' => 'Fecha Fin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventos()
    {
        return $this->hasMany(Evento::className(), ['CCM_idCCM' => 'idCCM']);
    }
}
