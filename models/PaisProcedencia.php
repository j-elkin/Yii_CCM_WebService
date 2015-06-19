<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pais_procedencia".
 *
 * @property integer $idpais_procedencia
 * @property string $nombre
 *
 * @property Persona[] $personas
 */
class PaisProcedencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pais_procedencia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idpais_procedencia' => 'ID País de Procedencia',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['pais_procedencia_idpais_procedencia' => 'idpais_procedencia']);
    }
}
