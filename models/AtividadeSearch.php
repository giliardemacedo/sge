<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Atividade;

/**
 * AtividadeSearch represents the model behind the search form of `app\models\Atividade`.
 */
class AtividadeSearch extends Atividade
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idatividade', 'idarea_atuacao', 'idsecao'], 'integer'],
            [['nome', 'descricao', 'material', 'tempoduracao', 'localaplicacao'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Atividade::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idatividade' => $this->idatividade,
            'idarea_atuacao' => $this->idarea_atuacao,
            'idsecao' => $this->idsecao,
            'tempoduracao' => $this->tempoduracao,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'descricao', $this->descricao])
            ->andFilterWhere(['like', 'material', $this->material])
            ->andFilterWhere(['like', 'localaplicacao', $this->localaplicacao]);

        return $dataProvider;
    }
}
