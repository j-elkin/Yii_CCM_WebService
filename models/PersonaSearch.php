<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Persona;

/**
 * PersonaSearch represents the model behind the search form about `app\models\Persona`.
 */
class PersonaSearch extends Persona
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [//tipo_doc_idtipo_doc exigia antes tipo integer
            //[['docPersona'], 'integer'],
            [['docPersona','nombre', 'apellidos', 'genero', 'fecha_nacimiento', 'correo_electronico', 'telefono', 'codigo_qr', 
            'tipo_doc_idtipo_doc', 'pais_procedencia_idpais_procedencia', 'institucion_idinstitucion', 'asistio', 'hotel'], 'safe'],
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
        $query = Persona::find();

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
        $query->joinWith('tipoDocIdtipoDoc');
        $query->joinWith('paisProcedenciaIdpaisProcedencia');
        $query->joinWith('institucionIdinstitucion');
        //$query->joinWith('tipoPersonaIdtipoPersona');
        
        $query->andFilterWhere([
            'docPersona' => $this->docPersona,
            'asistio' => $this->asistio,
            'hotel' => $this->hotel
            //'tipo_doc_idtipo_doc' => $this->tipo_doc_idtipo_doc, //Ya no se busca por id (integer)
            //'pais_procedencia_idpais_procedencia' => $this->pais_procedencia_idpais_procedencia,
            //'institucion_idinstitucion' => $this->institucion_idinstitucion,
            //'tipo_persona_idtipo_persona' => $this->tipo_persona_idtipo_persona,
        ]);


        


        $query->andFilterWhere(['like', 'persona.nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellidos', $this->apellidos])
            ->andFilterWhere(['like', 'genero', $this->genero])
            ->andFilterWhere(['like', 'fecha_nacimiento', $this->fecha_nacimiento])
            ->andFilterWhere(['like', 'correo_electronico', $this->correo_electronico])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'codigo_qr', $this->codigo_qr])
            ->andFilterWhere(['like', 'persona.hotel', $this->hotel])
            //nuevo para la busqueda por string
            ->andFilterWhere(['like', 'tipo_doc.tipo_documento', $this->tipo_doc_idtipo_doc])//tipo_doc.tipo_documento (tabla y campo en BD)
            ->andFilterWhere(['like', 'pais_procedencia.nombre', $this->pais_procedencia_idpais_procedencia])
            ->andFilterWhere(['like', 'institucion.nombre', $this->institucion_idinstitucion])
            ->andFilterWhere(['like', 'persona.asistio', $this->asistio]);
            

            

        return $dataProvider;
    }
}
