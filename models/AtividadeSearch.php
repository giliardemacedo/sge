<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Atividade;
use yii\db\Expression;

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
            //[['idatividade', 'idarea_atuacao', 'idsecao'], 'integer'],
            [['idatividade'], 'integer'],
            [['nome', 'descricao', 'material', 'tempoduracao', 'localaplicacao', 'idarea_atuacao', 'idsecao'], 'safe'],
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


    //Método Teste
    public function gerarAtividades($idsecao, $qtdafetivo, $qtdcarater, $qtdespiritual, $qtdfisico, $qtdintelectual, $qtdsocial, $params) {

        $query = Atividade::find()
            ->where(['atividade.idsecao' => $idsecao])->andWhere(['idarea_atuacao'=> 1])
            ->orderBy(new Expression('rand()'))
            ->limit($qtdafetivo);

        $query1 = Atividade::find()
            ->where(['atividade.idsecao' => $idsecao])->andWhere(['idarea_atuacao'=> 2])
            ->orderBy(new Expression('rand()'))
            ->limit($qtdcarater);

        
        $query2 = Atividade::find()
            ->where(['atividade.idsecao' => $idsecao])->andWhere(['idarea_atuacao'=> 3])
            ->orderBy(new Expression('rand()'))
            ->limit($qtdespiritual);
        
        $query3 = Atividade::find()
            ->where(['atividade.idsecao' => $idsecao])->andWhere(['idarea_atuacao'=> 4])
            ->orderBy(new Expression('rand()'))
            ->limit($qtdfisico);
        
        $query4 = Atividade::find()
            ->where(['atividade.idsecao' => $idsecao])->andWhere(['idarea_atuacao'=> 5])
            ->orderBy(new Expression('rand()'))
            ->limit($qtdintelectual); 

        
        $query5 = Atividade::find()
            ->where(['atividade.idsecao' => $idsecao])->andWhere(['idarea_atuacao'=> 6])
            ->orderBy(new Expression('rand()'))
            ->limit($qtdsocial);


        $query->union($query1)->union($query2)->union($query3)->union($query4)->union($query5);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>false,
        ]);

        return $dataProvider;
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

        //$query = Atividade::find(['atividade.idatividade','atividade.idarea_atuacao','atividade.idsecao','atividade.tempoduracao','atividade.nome','atividade.descricao','atividade.material','atividade.localaplicacao','area_atuacao.nome'])
        //->from('atividade')->innerJoin('area_atuacao', 'area_atuacao.idarea_atuacao = atividade.idarea_atuacao');


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

        $query->joinWith('areaAtuacao');
        $query->joinWith('secao');

        // grid filtering conditions
        $query->andFilterWhere([
            'idatividade' => $this->idatividade,
            //'idarea_atuacao' => $this->idarea_atuacao,
            //'idsecao' => $this->idsecao,
            'tempoduracao' => $this->tempoduracao,
        ]);

        $query->andFilterWhere(['like', 'atividade.nome', $this->nome])
            ->andFilterWhere(['like', 'descricao', $this->descricao])
            ->andFilterWhere(['like', 'material', $this->material])
            ->andFilterWhere(['like', 'localaplicacao', $this->localaplicacao])
            ->andFilterWhere(['like', 'area_atuacao.nome', $this->idarea_atuacao])
            ->andFilterWhere(['like', 'secao.nome', $this->idsecao]);

        return $dataProvider;
    }
}
