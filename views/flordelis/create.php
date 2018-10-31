<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Flordelis */

$this->title = Yii::t('app', 'Create Flordelis');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Flordelis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flordelis-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arraySecao' => $arraySecao,
    ]) ?>

</div>
