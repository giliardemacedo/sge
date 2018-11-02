<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Escoteiro */

$this->title = Yii::t('app', 'Update Escoteiro: ' . $model->idescoteiro, [
    'nameAttribute' => '' . $model->idescoteiro,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Escoteiros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idescoteiro, 'url' => ['view', 'id' => $model->idescoteiro]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="escoteiro-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arrayContato' => $arrayContato,
        'arrayEndereco' => $arrayEndereco,
    ]) ?>

</div>
