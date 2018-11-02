<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Escoteiro */

$this->title = Yii::t('app', 'Create Escoteiro');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Escoteiros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="escoteiro-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arrayContato' => $arrayContato,
        'arrayEndereco' => $arrayEndereco,
    ]) ?>

</div>
