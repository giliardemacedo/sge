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
