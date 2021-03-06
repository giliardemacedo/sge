<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PatrulhaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Patrulhas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patrulha-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Patrulha'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idpatrulha',
            [
                'attribute'=>'tropa_secao_idsecao',
                'value'=>'tropaSecaoIdsecao.nome'
            ],
            'nome',
            'gritodeguerra',
            'tipo',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {patrulha}',
                'buttons' => [

                    'patrulha' => function($url, $model, $key){
                        $url = Url::to(['patrulha/teste', 'id'=>$model->idpatrulha]);
                        return Html::a('patrulha', $url, ['title' => 'Patrulha']);

                        //return Html::button('patrulha', [
                        //    'class' => 'btn btm-denger',
                        //]);
                    
                    },
                ],
            ],
        ],
    ]); ?>
</div>
