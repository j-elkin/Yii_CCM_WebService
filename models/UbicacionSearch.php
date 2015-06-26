<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ubicacion;

/**
 * UbicacionSearch represents the model behind the search form about `app\models\Ubicacion`.
 */
class UbicacionSearch extends Ubicacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idubicacion'], 'integer'],
            [['hora_inicio', 'hora_fin', 'lugar', 'fecha', 'evento_idevento', 'limite_cupos'], 'safe'],
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
        $query = Ubicacion::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        //nuevo
        $query->joinWith('eventoIdevento');

        $query->andFilterWhere([
            'idubicacion' => $this->idubicacion,
            'hora_inicio' => $this->hora_inicio,
            'hora_fin' => $this->hora_fin,
            'fecha' => $this->fecha,
            'limite_cupos' => $this->limite_cupos,
            //'evento_idevento' => $this->evento_idevento,
        ]);

        $query->andFilterWhere(['like', 'lugar', $this->lugar])
            ->andFilterWhere(['like', 'evento.nombre', $this->evento_idevento]);

        return $dataProvider;
    }
}
