<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\PatrulhaHasEscoteiro */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patrulha-has-escoteiro-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'patrulha_idpatrulha')->
        widget(Select2::classname(), [
            'data' => $arrayPatrulha,
            'options' => ['placeholder' => Yii::t('app','Selecione a Patrulha ...')],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'Escoteiro_idescoteiro')->
        widget(Select2::classname(), [
            'data' => $arrayEscoteiro,
            'options' => ['placeholder' => Yii::t('app','Selecione o Escoteiro ...')],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
