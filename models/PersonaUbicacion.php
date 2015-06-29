<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "per_ubi".
 *
 * @property string $persona_docPersona
 * @property integer $ubicacion_idubicacion
 * @property integer $tipo_persona_idtipo_persona
 *
 * @property TipoPersona $tipoPersonaIdtipoPersona
 * @property Persona $personaDocPersona
 * @property Ubicacion $ubicacionIdubicacion
 */
class PersonaUbicacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'per_ubi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['persona_docPersona', 'ubicacion_idubicacion', 'tipo_persona_idtipo_persona'], 'required'],
            [['ubicacion_idubicacion', 'tipo_persona_idtipo_persona'], 'integer'],
            [['persona_docPersona'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'persona_docPersona' => 'Documento Persona',
            'ubicacion_idubicacion' => 'Ubicación del Evento',
            'tipo_persona_idtipo_persona' => 'Tipo Persona',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoPersonaIdtipoPersona()
    {
        return $this->hasOne(TipoPersona::className(), ['idtipo_persona' => 'tipo_persona_idtipo_persona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonaDocPersona()
    {
        return $this->hasOne(Persona::className(), ['docPersona' => 'persona_docPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUbicacionIdubicacion()
    {
        return $this->hasOne(Ubicacion::className(), ['idubicacion' => 'ubicacion_idubicacion']);
    }

  


    /**
     * Obtener el nombre del envento asociado a la ubicación
     * @return \yii\db\ActiveQuery
     */
    public function getNombreEvento()
    {
        $idEvento = $this->ubicacion_idubicacion;
        $modeloConsulta = Evento::find()
                            ->where('idevento = :idEvento', [':idEvento' => $idEvento])
                            ->one();

        $eventoName = (string) $modeloConsulta->nombre;//casting ya que recibe un objeto
        return $eventoName;
    }


}
