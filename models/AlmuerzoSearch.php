<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Almuerzo;

/**
 * AlmuerzoSearch represents the model behind the search form about `app\models\Almuerzo`.
 */
class AlmuerzoSearch extends Almuerzo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idAlmuerzo', 'persona_docPersona'], 'integer'],
            [['fecha', 'hora'], 'safe'],
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
        $query = Almuerzo::find();

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
            'idAlmuerzo' => $this->idAlmuerzo,
            'fecha' => $this->fecha,
            'hora' => $this->hora,
            'persona_docPersona' => $this->persona_docPersona,
        ]);

        return $dataProvider;
    }
}
