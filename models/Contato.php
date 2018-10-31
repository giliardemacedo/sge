<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contato".
 *
 * @property int $idcontato
 * @property string $numerotelefone
 * @property string $email
 * @property int $Escoteiro_idescoteiro
 *
 * @property Escoteiro $escoteiroIdescoteiro
 */
class Contato extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contato';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['numerotelefone', 'email', 'Escoteiro_idescoteiro'], 'required'],
            [['Escoteiro_idescoteiro'], 'integer'],
            [['numerotelefone'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 60],
            [['Escoteiro_idescoteiro'], 'exist', 'skipOnError' => true, 'targetClass' => Escoteiro::className(), 'targetAttribute' => ['Escoteiro_idescoteiro' => 'idescoteiro']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idcontato' => Yii::t('app', 'Idcontato'),
            'numerotelefone' => Yii::t('app', 'Numerotelefone'),
            'email' => Yii::t('app', 'Email'),
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
}
