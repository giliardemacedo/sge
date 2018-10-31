<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PatrulhaHasEscoteiro */

$this->title = Yii::t('app', 'Create Patrulha Has Escoteiro');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patrulha Has Escoteiros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patrulha-has-escoteiro-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
