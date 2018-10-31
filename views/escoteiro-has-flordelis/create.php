<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EscoteiroHasFlordelis */

$this->title = Yii::t('app', 'Create Escoteiro Has Flordelis');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Escoteiro Has Flordelis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="escoteiro-has-flordelis-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
