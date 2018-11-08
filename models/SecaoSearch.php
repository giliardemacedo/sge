<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Secao;

/**
 * SecaoSearch represents the model behind the search form of `app\models\Secao`.
 */
class SecaoSearch extends Secao
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idsecao'], 'integer'],
            [['nome', 'idgrupo'], 'safe'],
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
        $query = Secao::find();

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


        $query->joinWith('grupo');


        // grid filtering conditions
        $query->andFilterWhere([
            'idsecao' => $this->idsecao,
            //'idgrupo' => $this->idgrupo,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
        ->andFilterWhere(['like', 'grupo.nome', $this->idgrupo]);

        return $dataProvider;
    }
}
