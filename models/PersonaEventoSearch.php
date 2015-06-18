<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PersonaEvento;

/**
 * PersonaEventoSearch represents the model behind the search form about `app\models\PersonaEvento`.
 */
class PersonaEventoSearch extends PersonaEvento
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['evento_idevento', 'persona_idpersona'], 'integer'],
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
        $query = PersonaEvento::find();

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
            'evento_idevento' => $this->evento_idevento,
            'persona_idpersona' => $this->persona_idpersona,
        ]);

        return $dataProvider;
    }
}
