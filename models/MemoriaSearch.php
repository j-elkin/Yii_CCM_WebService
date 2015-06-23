<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Memoria;

/**
 * MemoriaSearch represents the model behind the search form about `app\models\Memoria`.
 */
class MemoriaSearch extends Memoria
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idmemoria'], 'integer'],
            [['nombre', 'descripcion', 'archivo', 'evento_idevento'], 'safe'],
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
        $query = Memoria::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('eventoIdevento');

        $query->andFilterWhere([
            'idmemoria' => $this->idmemoria,
            //'evento_idevento' => $this->evento_idevento,
        ]);

        $query->andFilterWhere(['like', 'memoria.nombre', $this->nombre])
            ->andFilterWhere(['like', 'memoria.descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'archivo', $this->archivo])
            ->andFilterWhere(['like', 'evento.nombre', $this->evento_idevento]);

        return $dataProvider;
    }
}
