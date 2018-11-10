<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\select2\Select2;

use kartik\datecontrol\DateControl;
/* @var $this yii\web\View */
/* @var $model app\models\Escoteiro */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="escoteiro-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cpf')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'registroueb')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'nascimento')->
    widget(DateControl::classname(), [
        'type'=>DateControl::FORMAT_DATE,
        'ajaxConversion'=>false,
        'widgetOptions' => [
            'pluginOptions' => [
                'autoclose' => true
            ]
        ]
    ]);
    ?>

    <?= $form->field($model, 'sexo')->
        widget(Select2::classname(), [
            //'data' => $arraySecao,
            'data' => [
                'M' => 'Masculino',
                'F' => 'Feminino',
            ],
            'options' => ['placeholder' => Yii::t('app','Selecione o Sexo ...')],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'estado')->
        widget(Select2::classname(), [
            //'data' => $arraySecao,
            'data' => [
                'ativo' => 'Ativo',
                'naoAtivo' => 'Não Ativo',
            ],
            'options' => ['placeholder' => Yii::t('app','Selecione o Estado ...')],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'chefe')->textInput() ?>

    <?= $form->field($model, 'categoriaChefe')->textInput(['maxlength' => true]) ?>

    <?= yii\base\View::render('@app/views/contato/_contato.php', ['model' => $arrayContato, 'form' => $form]) ?>

    <?= yii\base\View::render('@app/views/endereco/_endereco.php', ['model' => $arrayEndereco, 'form' => $form]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
