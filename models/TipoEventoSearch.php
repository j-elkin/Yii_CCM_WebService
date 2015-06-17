<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TipoEvento;

/**
 * TipoEventoSearch represents the model behind the search form about `app\models\TipoEvento`.
 */
class TipoEventoSearch extends TipoEvento
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idtipo_evento'], 'integer'],
            [['tipo_evento'], 'safe'],
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
        $query = TipoEvento::find();

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
            'idtipo_evento' => $this->idtipo_evento,
        ]);

        $query->andFilterWhere(['like', 'tipo_evento', $this->tipo_evento]);

        return $dataProvider;
    }
}
