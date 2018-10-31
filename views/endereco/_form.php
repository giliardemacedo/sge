<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Endereco */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="endereco-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'logradouro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bairro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numerocasa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Escoteiro_idescoteiro')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
