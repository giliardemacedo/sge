<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Patrulha */

$this->title = Yii::t('app', 'Create Patrulha');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patrulhas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patrulha-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        //'arraySecao'  => $arraySecao,
        'arrayTropa'  => $arrayTropa,
    ]) ?>

</div>
