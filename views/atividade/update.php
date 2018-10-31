<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Atividade */

$this->title = Yii::t('app', 'Update Atividade: ' . $model->idatividade, [
    'nameAttribute' => '' . $model->idatividade,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Atividades'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idatividade, 'url' => ['view', 'id' => $model->idatividade]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="atividade-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arrayAreaAtuacao' => $arrayAreaAtuacao,
        'arraySecao' => $arraySecao,
    ]) ?>

</div>
