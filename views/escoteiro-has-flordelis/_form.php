<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EscoteiroHasFlordelis */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="escoteiro-has-flordelis-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Escoteiro_idescoteiro')->textInput() ?>

    <?= $form->field($model, 'flordelis_secao_idsecao')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
