<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Escoteiro */

$this->title = $model->idescoteiro;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Escoteiros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="escoteiro-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idescoteiro], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idescoteiro], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        //'arraycontatos' => $arrayContato,
        'attributes' => [
            'idescoteiro',
            'nome',
            'nascimento',
            'cpf',
            'rg',
            'sexo',
            'registroueb',
            'estado',
            'chefe',
            'categoriaChefe',
            //'contatos.numerotelefone',
            //[
            //    'attribute'=>'contatos',
            //    'value'=>'numerotelefone'
            //],
        
            //[
            //    'attribute' => 'contatos',
            //    'value' => function ($arrayContato) {
            //    return $arrayContato->contato->nome;
            //    },
            //    //'visible' => yii\base\View::render('@app/views/contato/_contato.php', ['model' => $arrayContato, 'form' => $form]);
            //    'visible' => \Yii::$app->user->can('posts.contato.view'),
            //],

            //[                                                  // the owner name of the model
            //    'label' => 'Telefone',
            //    'value' => $arrayContato->numerotelefone,
                //'contentOptions' => ['class' => 'bg-red'],     // HTML attributes to customize value tag
                //'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
            //],
            
        ],
    ]) ?>

</div>
