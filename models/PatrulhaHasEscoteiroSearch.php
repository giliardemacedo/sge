<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PatrulhaHasEscoteiro;

/**
 * PatrulhaHasEscoteiroSearch represents the model behind the search form of `app\models\PatrulhaHasEscoteiro`.
 */
class PatrulhaHasEscoteiroSearch extends PatrulhaHasEscoteiro
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['patrulha_idpatrulha', 'Escoteiro_idescoteiro'], 'integer'],
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
        $query = PatrulhaHasEscoteiro::find();

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
            'patrulha_idpatrulha' => $this->patrulha_idpatrulha,
            'Escoteiro_idescoteiro' => $this->Escoteiro_idescoteiro,
        ]);

        return $dataProvider;
    }
}
