<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Persona;

/**
 * PersonaSearch represents the model behind the search form about `app\models\Persona`.
 */
class PersonaSearch extends Persona
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['docPersona', 'tipo_doc_idtipo_doc', 'pais_procedencia_idpais_procedencia', 'institucion_idinstitucion', 'tipo_persona_idtipo_persona'], 'integer'],
            [['nombre', 'apellidos', 'genero', 'fecha_nacimiento', 'correo_electronico', 'telefono', 'codigo_qr'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Persona::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'docPersona' => $this->docPersona,
            'tipo_doc_idtipo_doc' => $this->tipo_doc_idtipo_doc,
            'pais_procedencia_idpais_procedencia' => $this->pais_procedencia_idpais_procedencia,
            'institucion_idinstitucion' => $this->institucion_idinstitucion,
            'tipo_persona_idtipo_persona' => $this->tipo_persona_idtipo_persona,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellidos', $this->apellidos])
            ->andFilterWhere(['like', 'genero', $this->genero])
            ->andFilterWhere(['like', 'fecha_nacimiento', $this->fecha_nacimiento])
            ->andFilterWhere(['like', 'correo_electronico', $this->correo_electronico])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'codigo_qr', $this->codigo_qr]);

        return $dataProvider;
    }
}
