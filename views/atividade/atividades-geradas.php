<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\helpers\Url;

use app\models\Patrulha;
use app\models\PatrulhaHasEscoteiro;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PatrulhaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Lista de Atividades');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patrulha-teste">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Voltar'), ['gerar-atividade'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'idarea_atuacao',
                'value' => 'areaAtuacao.nome'
            ],
            [
                'attribute' => 'nome',
            ],
            [
                'attribute' => 'descricao',
            ],
            [
                'attribute' => 'material',
            ],
            [
                'attribute' => 'tempoduracao',
            ],
            [
                'attribute' => 'localaplicacao',
            ],

            
        ],
    ]); ?>
</div>
