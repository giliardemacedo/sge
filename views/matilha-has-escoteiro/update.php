<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MatilhaHasEscoteiro */

$this->title = Yii::t('app', 'Update Matilha Has Escoteiro: ' . $model->matilha_idmatilha, [
    'nameAttribute' => '' . $model->matilha_idmatilha,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Matilha Has Escoteiros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->matilha_idmatilha, 'url' => ['view', 'matilha_idmatilha' => $model->matilha_idmatilha, 'Escoteiro_idescoteiro' => $model->Escoteiro_idescoteiro]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="matilha-has-escoteiro-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
