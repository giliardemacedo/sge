<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EscoteiroHasFlordelis */

$this->title = Yii::t('app', 'Update Escoteiro Has Flordelis: ' . $model->Escoteiro_idescoteiro, [
    'nameAttribute' => '' . $model->Escoteiro_idescoteiro,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Escoteiro Has Flordelis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Escoteiro_idescoteiro, 'url' => ['view', 'Escoteiro_idescoteiro' => $model->Escoteiro_idescoteiro, 'flordelis_secao_idsecao' => $model->flordelis_secao_idsecao]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="escoteiro-has-flordelis-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
