<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\select2\Select2;

use kartik\datecontrol\DateControl;
/* @var $this yii\web\View */
/* @var $model app\models\Escoteiro */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gerar-atividade">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($atividades, 'idsecao')->
        widget(Select2::classname(), [
            'data' => [
                '1' => 'Lobinho',
                '2' => 'Escoteiro',
                '3' => 'Sênior',
                '4' => 'Pioneiro',
            ],
            'options' => ['placeholder' => Yii::t('app','Selecione a Seção ...')],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>
    
    <?= $form->field($atividades, 'qtdafetivo')->textInput()->label('Afetivo - Deseja Gerar Quantas Atividade Relacionadas a Essa Área de Atuação?')
    ?>
    <?= $form->field($atividades, 'qtdcarater')->textInput()->label('Carater - Deseja Gerar Quantas Atividade Relacionadas a Essa Área de Atuação?')
    ?>
    <?= $form->field($atividades, 'qtdespiritual')->textInput()->label('Espiritual - Deseja Gerar Quantas Atividade Relacionadas a Essa Área de Atuação?')
    ?>
    <?= $form->field($atividades, 'qtdfisico')->textInput()->label('Físico - Deseja Gerar Quantas Atividade Relacionadas a Essa Área de Atuação?')
    ?>
    <?= $form->field($atividades, 'qtdintelectual')->textInput()->label('Intelectual - Deseja Gerar Quantas Atividade Relacionadas a Essa Área de Atuação?')
    ?>
    <?= $form->field($atividades, 'qtdsocial')->textInput()->label('Social - Deseja Gerar Quantas Atividade Relacionadas a Essa Área de Atuação?')
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Gerar'),['gerar-atividade-visao'], ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
