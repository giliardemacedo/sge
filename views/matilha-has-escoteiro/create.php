<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MatilhaHasEscoteiro */

$this->title = Yii::t('app', 'Create Matilha Has Escoteiro');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Matilha Has Escoteiros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matilha-has-escoteiro-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
