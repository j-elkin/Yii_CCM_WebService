<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ccm;

/**
 * CcmSearch represents the model behind the search form about `app\models\Ccm`.
 */
class CcmSearch extends Ccm
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idCCM'], 'integer'],
            [['ciudad', 'direccion', 'telefono', 'fecha_inicio', 'fecha_fin'], 'safe'],
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
        $query = Ccm::find();

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
            'idCCM' => $this->idCCM,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
        ]);

        $query->andFilterWhere(['like', 'ciudad', $this->ciudad])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'telefono', $this->telefono]);

        return $dataProvider;
    }
}
