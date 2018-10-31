<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Patrulha */

$this->title = Yii::t('app', 'Update Patrulha: ' . $model->idpatrulha, [
    'nameAttribute' => '' . $model->idpatrulha,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patrulhas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idpatrulha, 'url' => ['view', 'id' => $model->idpatrulha]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="patrulha-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arrayTropa'  => $arrayTropa,
    ]) ?>

</div>
