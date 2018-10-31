<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MatilhaHasEscoteiroSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Matilha Has Escoteiros');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matilha-has-escoteiro-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Matilha Has Escoteiro'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'matilha_idmatilha',
            'Escoteiro_idescoteiro',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
