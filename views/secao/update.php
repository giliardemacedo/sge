<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Secao */

$this->title = Yii::t('app', 'Update Secao: ' . $model->idsecao, [
    'nameAttribute' => '' . $model->idsecao,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Secaos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idsecao, 'url' => ['view', 'id' => $model->idsecao]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="secao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arrayGrupo' => $arrayGrupo,
    ]) ?>

</div>
