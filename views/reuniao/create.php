<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Reuniao */

$this->title = Yii::t('app', 'Create Reuniao');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reuniaos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reuniao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arrayGrupo' => $arrayGrupo,
    ]) ?>

</div>
