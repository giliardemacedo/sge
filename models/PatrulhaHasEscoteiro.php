<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patrulha_has_Escoteiro".
 *
 * @property int $patrulha_idpatrulha
 * @property int $Escoteiro_idescoteiro
 *
 * @property Escoteiro $escoteiroIdescoteiro
 * @property Patrulha $patrulhaIdpatrulha
 */
class PatrulhaHasEscoteiro extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'patrulha_has_Escoteiro';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['patrulha_idpatrulha', 'Escoteiro_idescoteiro'], 'required'],
            [['patrulha_idpatrulha', 'Escoteiro_idescoteiro'], 'integer'],
            [['patrulha_idpatrulha', 'Escoteiro_idescoteiro'], 'unique', 'targetAttribute' => ['patrulha_idpatrulha', 'Escoteiro_idescoteiro']],
            [['Escoteiro_idescoteiro'], 'exist', 'skipOnError' => true, 'targetClass' => Escoteiro::className(), 'targetAttribute' => ['Escoteiro_idescoteiro' => 'idescoteiro']],
            [['patrulha_idpatrulha'], 'exist', 'skipOnError' => true, 'targetClass' => Patrulha::className(), 'targetAttribute' => ['patrulha_idpatrulha' => 'idpatrulha']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'patrulha_idpatrulha' => Yii::t('app', 'Patrulha'),
            'Escoteiro_idescoteiro' => Yii::t('app', 'Escoteiro'),
        ];
    }

    public static function getMembroPatrulha($idpatrulha){
        //$model = Endereco::find()->where(["Escoteiro_idescoteiro" => $idescoteiro])->one();
        //$model = PatrulhaHasEscoteiro::find()->select(['Escoteiro.nome'])->from('Escoteiro')
        //->innerJoin('patrulha_has_Escoteiro', 'patrulha_has_Escoteiro.Escoteiro_idescoteiro = Escoteiro.idescoteiro')
        //->innerJoin('patrulha', 'patrulha_has_Escoteiro.patrulha_idpatrulha = patrulha.idpatrulha')
        //->where(['patrulha.idpatrulha' => $idpatrulha])->one();


        //select Escoteiro.nome from Escoteiro
        //inner join patrulha_has_Escoteiro on
        //Escoteiro.idescoteiro = patrulha_has_Escoteiro.Escoteiro_idescoteiro
        //where patrulha_has_Escoteiro.patrulha_idpatrulha = 5;
        
        $query = Escoteiro::find()
        ->innerJoin('patrulha_has_Escoteiro', 'Escoteiro.idescoteiro = patrulha_has_Escoteiro.Escoteiro_idescoteiro')
        ->where(['patrulha_has_Escoteiro.patrulha_idpatrulha' => $idpatrulha]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        /*if(!empty($model)){
            return $model->nome;
        }*/
    
        return $dataProvider;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEscoteiroIdescoteiro()
    {
        return $this->hasOne(Escoteiro::className(), ['idescoteiro' => 'Escoteiro_idescoteiro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatrulhaIdpatrulha()
    {
        return $this->hasOne(Patrulha::className(), ['idpatrulha' => 'patrulha_idpatrulha']);
    }
}
