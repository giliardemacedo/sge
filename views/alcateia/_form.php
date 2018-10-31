<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Alcateia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alcateia-form">

    <?php $form = ActiveForm::begin(); ?>

     <?= $form->field($model, 'secao_idsecao')->
        widget(Select2::classname(), [
            'data' => $arraySecao,
            'options' => ['placeholder' => Yii::t('app','Selecione a Seção ...')],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>
    
    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
