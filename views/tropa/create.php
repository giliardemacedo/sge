<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tropa */

$this->title = Yii::t('app', 'Create Tropa');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tropas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tropa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arraySecao' => $arraySecao,
    ]) ?>

</div>
