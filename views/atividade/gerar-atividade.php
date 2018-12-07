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
    
    <?= $form->field($atividades, 'idarea_atuacao')->
        widget(Select2::classname(), [
            //'data' => $arraySecao,
            'data' => [
                '1' => 'Afetivo',
                '2' => 'Caracter',
                '3' => 'Espiritual',
                '4' => 'Físico',
                '5' => 'Intelectual',
                '6' => 'Social',
            ],
            'options' => ['placeholder' => Yii::t('app','Selecione  ...')],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>
    <?= $form->field($atividades, 'quantidade')->textInput()
    ?>


   


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
