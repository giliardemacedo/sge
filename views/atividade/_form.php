
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Atividade */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="atividade-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idarea_atuacao')->
        widget(Select2::classname(), [
            'data' => $arrayAreaAtuacao,
            'options' => ['placeholder' => Yii::t('app','Selecione a Área de Atuação ...')],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'idsecao')->
        widget(Select2::classname(), [
            'data' => $arraySecao,
            'options' => ['placeholder' => Yii::t('app','Selecione a Seção ...')],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'material')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempoduracao')->textInput() ?>

    <?= $form->field($model, 'localaplicacao')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
