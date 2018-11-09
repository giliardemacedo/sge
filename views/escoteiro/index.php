<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\Escoteiro;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EscoteiroSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Escoteiros');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="escoteiro-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Escoteiro'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel, 

        //'searchModelContato' => $searchModelContato,
        //'dataProviderContato' => $dataProviderContato,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idescoteiro',
            'nome',
            'nascimento',
            'cpf',
            'rg',
            //'sexo',
            //'registroueb',
            //'estado',
            //'chefe',
            //'categoriaChefe',

            //'contatos.numerotelefone',

            [
                'attribute' => 'numerotelefone',
                'label' => 'Número Telefone',
                'value' => function($data){
                    return Escoteiro::getContatoTelefone($data->idescoteiro);
                },
            ],
            [
                'attribute' => 'email',
                'label' => 'E-mail',
                'value' => function($data){
                    return Escoteiro::getContatoEmail($data->idescoteiro);
                },
            ],

            [
                'attribute' => 'logradouro',
                'label' => 'Logradouro',
                'value' => function($data){
                    return Escoteiro::getEnderecoLogradouro($data->idescoteiro);
                },
            ],
            
            [
                'attribute' => 'bairro',
                'label' => 'Bairro',
                'value' => function($data){
                    return Escoteiro::getEnderecoBairro($data->idescoteiro);
                },
            ],

            [
                'attribute' => 'numerocasa',
                'label' => 'Número da Casa',
                'value' => function($data){
                    return Escoteiro::getEnderecoNumeroCasa($data->idescoteiro);
                },
            ],
            
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
