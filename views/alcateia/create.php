<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Alcateia */

$this->title = 'Create Alcateia';
$this->params['breadcrumbs'][] = ['label' => 'Alcateias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alcateia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arraySecao' => $arraySecao,
    ]) ?>

</div>
