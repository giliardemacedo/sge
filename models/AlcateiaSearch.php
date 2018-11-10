<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Alcateia;

/**
 * AlcateiaSearch represents the model behind the search form of `app\models\Alcateia`.
 */
class AlcateiaSearch extends Alcateia
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['secao_idsecao'], 'integer'],
            [['nome', 'secao_idsecao'], 'safe'],
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
        $query = Alcateia::find();

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

        $query->joinWith('secaoIdsecao');

        // grid filtering conditions
        //$query->andFilterWhere([
        //    'secao_idsecao' => $this->secao_idsecao,
        //]);

        $query->andFilterWhere(['like', 'alcateia.nome', $this->nome])
            ->andFilterWhere(['like', 'alcateia.nome', $this->secao_idsecao]);

        return $dataProvider;
    }
}
