<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EscoteiroHasFlordelis;

/**
 * EscoteiroHasFlordelisSearch represents the model behind the search form of `app\models\EscoteiroHasFlordelis`.
 */
class EscoteiroHasFlordelisSearch extends EscoteiroHasFlordelis
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Escoteiro_idescoteiro', 'flordelis_secao_idsecao'], 'integer'],
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
        $query = EscoteiroHasFlordelis::find();

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
            'Escoteiro_idescoteiro' => $this->Escoteiro_idescoteiro,
            'flordelis_secao_idsecao' => $this->flordelis_secao_idsecao,
        ]);

        return $dataProvider;
    }
}
