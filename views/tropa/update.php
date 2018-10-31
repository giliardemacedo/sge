<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tropa */

$this->title = Yii::t('app', 'Update Tropa: ' . $model->secao_idsecao, [
    'nameAttribute' => '' . $model->secao_idsecao,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tropas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->secao_idsecao, 'url' => ['view', 'id' => $model->secao_idsecao]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tropa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arraySecao' => $arraySecao,
    ]) ?>

</div>
