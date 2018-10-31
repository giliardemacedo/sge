<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "matilha_has_Escoteiro".
 *
 * @property int $matilha_idmatilha
 * @property int $Escoteiro_idescoteiro
 *
 * @property Escoteiro $escoteiroIdescoteiro
 * @property Matilha $matilhaIdmatilha
 */
class MatilhaHasEscoteiro extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matilha_has_Escoteiro';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['matilha_idmatilha', 'Escoteiro_idescoteiro'], 'required'],
            [['matilha_idmatilha', 'Escoteiro_idescoteiro'], 'integer'],
            [['matilha_idmatilha', 'Escoteiro_idescoteiro'], 'unique', 'targetAttribute' => ['matilha_idmatilha', 'Escoteiro_idescoteiro']],
            [['Escoteiro_idescoteiro'], 'exist', 'skipOnError' => true, 'targetClass' => Escoteiro::className(), 'targetAttribute' => ['Escoteiro_idescoteiro' => 'idescoteiro']],
            [['matilha_idmatilha'], 'exist', 'skipOnError' => true, 'targetClass' => Matilha::className(), 'targetAttribute' => ['matilha_idmatilha' => 'idmatilha']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'matilha_idmatilha' => Yii::t('app', 'Matilha Idmatilha'),
            'Escoteiro_idescoteiro' => Yii::t('app', 'Escoteiro Idescoteiro'),
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
    public function getMatilhaIdmatilha()
    {
        return $this->hasOne(Matilha::className(), ['idmatilha' => 'matilha_idmatilha']);
    }
}
