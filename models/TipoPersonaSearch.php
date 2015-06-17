<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TipoPersona;

/**
 * TipoPersonaSearch represents the model behind the search form about `app\models\TipoPersona`.
 */
class TipoPersonaSearch extends TipoPersona
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idtipo_persona'], 'integer'],
            [['tipo_persona'], 'safe'],
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
        $query = TipoPersona::find();

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
            'idtipo_persona' => $this->idtipo_persona,
        ]);

        $query->andFilterWhere(['like', 'tipo_persona', $this->tipo_persona]);

        return $dataProvider;
    }
}
