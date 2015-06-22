<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_doc".
 *
 * @property integer $idtipo_doc
 * @property string $tipo_documento
 *
 * @property Persona[] $personas
 */
class TipoDoc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_doc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_documento'], 'required'],
            [['idtipo_doc'], 'integer'],
            [['tipo_documento'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idtipo_doc' => 'ID del Tipo de Documento',
            'tipo_documento' => 'Tipo Documento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['tipo_doc_idtipo_doc' => 'idtipo_doc']);
    }
}
