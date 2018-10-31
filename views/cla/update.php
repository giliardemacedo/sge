<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cla */

$this->title = Yii::t('app', 'Update Cla: ' . $model->secao_idsecao, [
    'nameAttribute' => '' . $model->secao_idsecao,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->secao_idsecao, 'url' => ['view', 'id' => $model->secao_idsecao]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cla-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arraySecao'  => $arraySecao,
    ]) ?>

</div>
