<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cla */

$this->title = Yii::t('app', 'Create Cla');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cla-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arraySecao'  => $arraySecao,
    ]) ?>

</div>
