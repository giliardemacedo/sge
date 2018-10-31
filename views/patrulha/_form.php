<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Patrulha */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patrulha-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tropa_secao_idsecao')->
        widget(Select2::classname(), [
            //'data' => $arraySecao,
            'data' => $arrayTropa,
            'options' => ['placeholder' => Yii::t('app','Selecione a Seção ...')],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cores')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gritodeguerra')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
