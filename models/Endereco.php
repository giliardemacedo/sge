<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "endereco".
 *
 * @property int $idendereco
 * @property string $logradouro
 * @property string $bairro
 * @property string $numerocasa
 * @property int $Escoteiro_idescoteiro
 *
 * @property Escoteiro $escoteiroIdescoteiro
 */
class Endereco extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'endereco';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['logradouro', 'bairro', 'numerocasa', 'Escoteiro_idescoteiro'], 'required'],
            [['Escoteiro_idescoteiro'], 'integer'],
            [['logradouro', 'bairro', 'numerocasa'], 'string', 'max' => 45],
            [['Escoteiro_idescoteiro'], 'exist', 'skipOnError' => true, 'targetClass' => Escoteiro::className(), 'targetAttribute' => ['Escoteiro_idescoteiro' => 'idescoteiro']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idendereco' => Yii::t('app', 'Idendereco'),
            'logradouro' => Yii::t('app', 'Logradouro'),
            'bairro' => Yii::t('app', 'Bairro'),
            'numerocasa' => Yii::t('app', 'Numerocasa'),
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
