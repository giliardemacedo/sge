<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EscoteiroHasReuniao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="escoteiro-has-reuniao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Escoteiro_idescoteiro')->textInput() ?>

    <?= $form->field($model, 'reuniao_idreuniao')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
