<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Reuniao */

$this->title = Yii::t('app', 'Update Reuniao: ' . $model->idreuniao, [
    'nameAttribute' => '' . $model->idreuniao,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reuniaos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idreuniao, 'url' => ['view', 'id' => $model->idreuniao]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="reuniao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arrayGrupo' => $arrayGrupo,
    ]) ?>

</div>
