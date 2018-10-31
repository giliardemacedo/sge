<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ClaHasEscoteiro */

$this->title = Yii::t('app', 'Create Cla Has Escoteiro');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cla Has Escoteiros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cla-has-escoteiro-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
