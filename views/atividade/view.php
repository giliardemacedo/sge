<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Atividade */

$this->title = $model->idatividade;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Atividades'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atividade-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idatividade], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idatividade], [
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
            'idatividade',
            'idarea_atuacao',
            'idsecao',
            'nome',
            'descricao',
            'material',
            'tempoduracao',
            'localaplicacao',
        ],
    ]) ?>

</div>
