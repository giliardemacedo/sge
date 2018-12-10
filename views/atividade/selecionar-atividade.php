<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Atividade */

$this->title = Yii::t('app', 'Gerar Atividades');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Gerar Atividade'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atividade-gerar">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('form-gerar-atividade', [
        'atividades' => $atividades,
    ]) ?>

</div>
