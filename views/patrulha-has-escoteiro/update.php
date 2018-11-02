<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PatrulhaHasEscoteiro */

$this->title = Yii::t('app', 'Update Patrulha Has Escoteiro: ' . $model->patrulha_idpatrulha, [
    'nameAttribute' => '' . $model->patrulha_idpatrulha,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patrulha Has Escoteiros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->patrulha_idpatrulha, 'url' => ['view', 'patrulha_idpatrulha' => $model->patrulha_idpatrulha, 'Escoteiro_idescoteiro' => $model->Escoteiro_idescoteiro]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="patrulha-has-escoteiro-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arrayEscoteiro' => $arrayEscoteiro,
        'arrayPatrulha' => $arrayPatrulha,
    ]) ?>

</div>
