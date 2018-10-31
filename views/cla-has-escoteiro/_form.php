<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClaHasEscoteiro */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cla-has-escoteiro-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cla_secao_idsecao')->textInput() ?>

    <?= $form->field($model, 'Escoteiro_idescoteiro')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
