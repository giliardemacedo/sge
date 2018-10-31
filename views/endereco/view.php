<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Endereco */

$this->title = $model->idendereco;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Enderecos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="endereco-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idendereco], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idendereco], [
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
            'idendereco',
            'logradouro',
            'bairro',
            'numerocasa',
            'Escoteiro_idescoteiro',
        ],
    ]) ?>

</div>
