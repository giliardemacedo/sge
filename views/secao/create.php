<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Secao */

$this->title = Yii::t('app', 'Create Secao');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Secaos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="secao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arrayGrupo' => $arrayGrupo,
    ]) ?>

</div>
