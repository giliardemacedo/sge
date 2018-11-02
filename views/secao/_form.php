<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Secao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="secao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idgrupo')->
        widget(Select2::classname(), [
            'data' => $arrayGrupo,
            'options' => ['placeholder' => Yii::t('app','Selecione o Grupo ...')],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
