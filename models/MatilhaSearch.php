<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Matilha;

/**
 * MatilhaSearch represents the model behind the search form of `app\models\Matilha`.
 */
class MatilhaSearch extends Matilha
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idmatilha'], 'integer'],
            [['nome', 'alcateia_secao_idsecao'], 'safe'],
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
        $query = Matilha::find();

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

        $query->joinWith('alcateiaSecaoIdsecao');

        // grid filtering conditions
        $query->andFilterWhere([
            'idmatilha' => $this->idmatilha,
            //'alcateia_secao_idsecao' => $this->alcateia_secao_idsecao,
        ]);

        $query->andFilterWhere(['like', 'matilha.nome', $this->nome])
            ->andFilterWhere(['like', 'alcateia.nome', $this->alcateia_secao_idsecao]);

        return $dataProvider;
    }
}
