<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Flordelis */

$this->title = Yii::t('app', 'Update Flordelis: ' . $model->secao_idsecao, [
    'nameAttribute' => '' . $model->secao_idsecao,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Flordelis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->secao_idsecao, 'url' => ['view', 'id' => $model->secao_idsecao]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="flordelis-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arraySecao' => $arraySecao,
    ]) ?>

</div>
