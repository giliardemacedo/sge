<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PatrulhaHasEscoteiroSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Patrulha Has Escoteiros');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patrulha-has-escoteiro-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Patrulha Has Escoteiro'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'patrulha_idpatrulha',
            [
                'attribute' => 'patrulha_idpatrulha',
                'value' => 'patrulhaIdpatrulha.nome',
            ],
            //'Escoteiro_idescoteiro',
            [
                'attribute' => 'Escoteiro_idescoteiro',
                'value' => 'escoteiroIdescoteiro.nome',
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
