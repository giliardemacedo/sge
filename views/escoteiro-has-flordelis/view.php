<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EscoteiroHasFlordelis */

$this->title = $model->Escoteiro_idescoteiro;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Escoteiro Has Flordelis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="escoteiro-has-flordelis-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'Escoteiro_idescoteiro' => $model->Escoteiro_idescoteiro, 'flordelis_secao_idsecao' => $model->flordelis_secao_idsecao], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'Escoteiro_idescoteiro' => $model->Escoteiro_idescoteiro, 'flordelis_secao_idsecao' => $model->flordelis_secao_idsecao], [
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
            'Escoteiro_idescoteiro',
            'flordelis_secao_idsecao',
        ],
    ]) ?>

</div>
