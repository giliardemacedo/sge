<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Secao */

$this->title = $model->idsecao;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Secaos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="secao-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idsecao], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idsecao], [
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
            'idsecao',
            'idgrupo',
            'nome',
        ],
    ]) ?>

</div>
