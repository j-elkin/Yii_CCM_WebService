<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Evento;

/**
 * EventoSearch represents the model behind the search form about `app\models\Evento`.
 */
class EventoSearch extends Evento
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'idevento'], 'integer'],
            [['nombre', 'descripcion','tipo_evento_idtipo_evento', 'CCM_idCCM', 'tipo_area_idtipo_area'], 'safe'],
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
        $query = Evento::find();

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
        $query->joinWith('tipoEventoIdtipoEvento');
        $query->joinWith('cCMIdCCM');
        $query->joinWith('tipoAreaIdtipoArea');

        $query->andFilterWhere([
            'idevento' => $this->idevento,
            //'tipo_evento_idtipo_evento' => $this->tipo_evento_idtipo_evento,
            //'CCM_idCCM' => $this->CCM_idCCM,
            //'tipo_area_idtipo_area' => $this->tipo_area_idtipo_area,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            //nuevo para la busqueda por string
            ->andFilterWhere(['like', 'tipo_evento.tipo_evento', $this->tipo_evento_idtipo_evento])
            ->andFilterWhere(['like', 'ccm.ciudad', $this->CCM_idCCM])
            ->andFilterWhere(['like', 'tipo_area.tipo_area', $this->tipo_area_idtipo_area]);

        return $dataProvider;
    }
}
