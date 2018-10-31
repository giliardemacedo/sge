<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EscoteiroHasReuniao */

$this->title = Yii::t('app', 'Update Escoteiro Has Reuniao: ' . $model->Escoteiro_idescoteiro, [
    'nameAttribute' => '' . $model->Escoteiro_idescoteiro,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Escoteiro Has Reuniaos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Escoteiro_idescoteiro, 'url' => ['view', 'Escoteiro_idescoteiro' => $model->Escoteiro_idescoteiro, 'reuniao_idreuniao' => $model->reuniao_idreuniao]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="escoteiro-has-reuniao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
