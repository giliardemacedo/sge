<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Alcateia */

$this->title = 'Update Alcateia: ' . $model->secao_idsecao;
$this->params['breadcrumbs'][] = ['label' => 'Alcateias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->secao_idsecao, 'url' => ['view', 'id' => $model->secao_idsecao]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="alcateia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arraySecao' => $arraySecao,
    ]) ?>

</div>
