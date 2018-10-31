<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PatrulhaHasEscoteiro */

$this->title = $model->patrulha_idpatrulha;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patrulha Has Escoteiros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patrulha-has-escoteiro-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'patrulha_idpatrulha' => $model->patrulha_idpatrulha, 'Escoteiro_idescoteiro' => $model->Escoteiro_idescoteiro], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'patrulha_idpatrulha' => $model->patrulha_idpatrulha, 'Escoteiro_idescoteiro' => $model->Escoteiro_idescoteiro], [
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
            'patrulha_idpatrulha',
            'Escoteiro_idescoteiro',
        ],
    ]) ?>

</div>
