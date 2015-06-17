<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TipoArea;

/**
 * TipoAreaSearch represents the model behind the search form about `app\models\TipoArea`.
 */
class TipoAreaSearch extends TipoArea
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idtipo_area'], 'integer'],
            [['tipo_area'], 'safe'],
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
        $query = TipoArea::find();

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
            'idtipo_area' => $this->idtipo_area,
        ]);

        $query->andFilterWhere(['like', 'tipo_area', $this->tipo_area]);

        return $dataProvider;
    }
}
