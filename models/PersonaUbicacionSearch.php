<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PersonaUbicacion;

/**
 * PersonaUbicacionSearch represents the model behind the search form about `app\models\PersonaUbicacion`.
 */
class PersonaUbicacionSearch extends PersonaUbicacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['persona_docPersona','ubicacion_idubicacion', 'tipo_persona_idtipo_persona'], 'safe'],
            //[['ubicacion_idubicacion', 'tipo_persona_idtipo_persona'], 'integer'],
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
        $query = PersonaUbicacion::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query -> joinWith('tipoPersonaIdtipoPersona');
        $query -> joinWith('ubicacionIdubicacion');
        //$query -> joinWith('evento');

        $query->andFilterWhere([
            //'ubicacion_idubicacion' => $this->ubicacion_idubicacion,
            //'tipo_persona_idtipo_persona' => $this->tipo_persona_idtipo_persona,
            //'evento' => $this->evento,
        ]);

        $query->andFilterWhere(['like', 'persona_docPersona', $this->persona_docPersona])
            ->andFilterWhere(['like', 'tipo_persona.tipo_persona', $this->tipo_persona_idtipo_persona])
            ->andFilterWhere(['like', 'ubicacion.lugar', $this->ubicacion_idubicacion]);

        return $dataProvider;
    }
}
