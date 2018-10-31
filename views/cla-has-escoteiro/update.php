<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClaHasEscoteiro */

$this->title = Yii::t('app', 'Update Cla Has Escoteiro: ' . $model->cla_secao_idsecao, [
    'nameAttribute' => '' . $model->cla_secao_idsecao,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cla Has Escoteiros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cla_secao_idsecao, 'url' => ['view', 'cla_secao_idsecao' => $model->cla_secao_idsecao, 'Escoteiro_idescoteiro' => $model->Escoteiro_idescoteiro]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cla-has-escoteiro-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
