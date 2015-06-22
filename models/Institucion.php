<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "institucion".
 *
 * @property integer $idinstitucion
 * @property string $nombre
 * @property string $pais
 * @property string $ciudad
 *
 * @property Persona[] $personas
 */
class Institucion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'institucion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'pais', 'ciudad'], 'required'],
            [['idinstitucion'], 'integer'],
            [['nombre', 'pais', 'ciudad'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idinstitucion' => 'ID de la Institución',
            'nombre' => 'Institución',
            'pais' => 'Pais',
            'ciudad' => 'Ciudad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['institucion_idinstitucion' => 'idinstitucion']);
    }
}
