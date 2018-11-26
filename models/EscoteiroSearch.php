<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Escoteiro;
/**
 * EscoteiroSearch represents the model behind the search form of `app\models\Escoteiro`.
 */
class EscoteiroSearch extends Escoteiro
{

    //CAMPO DE PESQUISA VIRTUAL
    //Compo Contato
    public $numerotelefone;
    public $email;

    //Campo Endereco
    public $logradouro;
    public $bairro;
    public $numerocasa;


    //public $numerotelefone;
    //public $numerotelefone;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idescoteiro', 'estado', 'chefe'], 'integer'],
            [['nome', 'nascimento', 'cpf', 'rg', 'sexo', 'registroueb', 'categoriaChefe'], 'safe'],
            //CAMPO DE PESQUISA VIRTUAL
            [['numerotelefone', 'email','logradouro', 'bairro', 'numerocasa'], 'safe'],
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

    public function listarPorPatrulha($idpatrulha,$params) {
        $query = Escoteiro::find()
        ->innerJoin('patrulha_has_Escoteiro', 'Escoteiro.idescoteiro = patrulha_has_Escoteiro.Escoteiro_idescoteiro')
        ->where(['patrulha_has_Escoteiro.patrulha_idpatrulha' => $idpatrulha]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        /*if(!empty($model)){
            return $model->nome;
        }*/
    
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
        //var_dump($params);
        //die();
        $query = Escoteiro::find();
        //$query = (new \yii\db\Query())->select(['Escoteiro.idescoteiro','Escoteiro.nome', 'Escoteiro.nascimento', 'Escoteiro.cpf', 'Escoteiro.rg', 'Escoteiro.sexo', 'Escoteiro.registroueb', 'Escoteiro.estado', 'contato.idcontato', 'contato.Escoteiro_idescoteiro', 'contato.numerotelefone', 'contato.email'])
        //->from('Escoteiro')->innerJoin('contato', 'contato.Escoteiro_idescoteiro = Escoteiro.idescoteiro');

        //$query = Escoteiro::find(['Escoteiro.idescoteiro','Escoteiro.nome', 'Escoteiro.nascimento', 'Escoteiro.cpf', 'Escoteiro.rg', 'Escoteiro.sexo', 'Escoteiro.registroueb', 'Escoteiro.estado', 'contato.idcontato', 'contato.Escoteiro_idescoteiro', 'contato.numerotelefone', 'contato.email'])
        //->from('Escoteiro')->innerJoin('contato', 'contato.Escoteiro_idescoteiro = Escoteiro.idescoteiro');


        /*
        if(!is_null($numerotelefone))
        {
            //select Escoteiro.*, contato.numerotelefone from Escoteiro
            //inner join contato on
            //contato.Escoteiro_idescoteiro = Escoteiro.idescoteiro
            //where Escoteiro.idescoteiro = 5;

            $query->find(['contato.numerotelefone'])
            ->innerJoin('contato', 'contato.Escoteiro_idescoteiro = Escoteiro.idescoteiro')
            ->where(['Escoteiro.idescoteiro'=>$this->idescoteiro]);
        }
        */

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        //CAMPO DE PESQUISA VIRTUAL
        //Contato
        $dataProvider->sort->attributes['numerotelefone'] = [
            'asc' => ['contato.numerotelefone' => SORT_ASC],
            'desc' => ['contato.numerotelefone' => SORT_DESC],
            'default' => SORT_ASC
        ];

        $dataProvider->sort->attributes['email'] = [
            'asc' => ['contato.email' => SORT_ASC],
            'desc' => ['contato.email' => SORT_DESC],
            'default' => SORT_ASC
        ];
        //Endereço
        $dataProvider->sort->attributes['logradouro'] = [
            'asc' => ['endereco.logradouro' => SORT_ASC],
            'desc' => ['endereco.logradouro' => SORT_DESC],
            'default' => SORT_ASC
        ];

        $dataProvider->sort->attributes['bairro'] = [
            'asc' => ['endereco.bairro' => SORT_ASC],
            'desc' => ['endereco.bairro' => SORT_DESC],
            'default' => SORT_ASC
        ];

        $dataProvider->sort->attributes['numerocasa'] = [
            'asc' => ['endereco.numerocasa' => SORT_ASC],
            'desc' => ['endereco.numerocasa' => SORT_DESC],
            'default' => SORT_ASC
        ];



        //CAMPO DE PESQUISA VIRTUAL
        $query->joinWith(['contatos']);
        $query->joinWith(['enderecos']);

        $this->load($params);


        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idescoteiro' => $this->idescoteiro,
            'nascimento' => $this->nascimento,
            'estado' => $this->estado,
            'chefe' => $this->chefe,
        ]);
    


        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'cpf', $this->cpf])
            ->andFilterWhere(['like', 'rg', $this->rg])
            ->andFilterWhere(['like', 'sexo', $this->sexo])
            ->andFilterWhere(['like', 'registroueb', $this->registroueb])
            //->andFilterWhere(['like', 'contatos.numerotelefone', $numerotelefone])
            ->andFilterWhere(['like', 'categoriaChefe', $this->categoriaChefe]);


            //CAMPO DE PESQUISA VIRTUAL
            $query->joinWith(['contatos' => function ($q) {
                                $q->where('contato.numerotelefone LIKE "%' . $this->numerotelefone . '%"');
            }]);

            $query->joinWith(['contatos' => function ($q) {
                $q->where('contato.email LIKE "%' . $this->email . '%"');
            }]);


            $query->joinWith(['enderecos' => function ($q) {
                $q->where('endereco.logradouro LIKE "%' . $this->logradouro . '%"');
            }]);

            $query->joinWith(['enderecos' => function ($q) {
                $q->where('endereco.bairro LIKE "%' . $this->bairro . '%"');
            }]);

            $query->joinWith(['enderecos' => function ($q) {
                $q->where('endereco.numerocasa LIKE "%' . $this->numerocasa . '%"');
            }]);




        return $dataProvider;
    }
}
