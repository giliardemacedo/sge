<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MatilhaHasEscoteiro */

$this->title = $model->matilha_idmatilha;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Matilha Has Escoteiros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matilha-has-escoteiro-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'matilha_idmatilha' => $model->matilha_idmatilha, 'Escoteiro_idescoteiro' => $model->Escoteiro_idescoteiro], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'matilha_idmatilha' => $model->matilha_idmatilha, 'Escoteiro_idescoteiro' => $model->Escoteiro_idescoteiro], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'matilha_idmatilha',
            'Escoteiro_idescoteiro',
        ],
    ]) ?>

</div>
