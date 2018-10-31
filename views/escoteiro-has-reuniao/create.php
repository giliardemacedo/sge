<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EscoteiroHasReuniao */

$this->title = Yii::t('app', 'Create Escoteiro Has Reuniao');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Escoteiro Has Reuniaos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="escoteiro-has-reuniao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
