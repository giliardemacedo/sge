<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Matilha */

$this->title = Yii::t('app', 'Update Matilha: ' . $model->idmatilha, [
    'nameAttribute' => '' . $model->idmatilha,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Matilhas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idmatilha, 'url' => ['view', 'id' => $model->idmatilha]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="matilha-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arraySecao'  => $arraySecao,
    ]) ?>

</div>
