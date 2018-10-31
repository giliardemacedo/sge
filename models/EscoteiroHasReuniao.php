<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Escoteiro_has_reuniao".
 *
 * @property int $Escoteiro_idescoteiro
 * @property int $reuniao_idreuniao
 *
 * @property Escoteiro $escoteiroIdescoteiro
 * @property Reuniao $reuniaoIdreuniao
 */
class EscoteiroHasReuniao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Escoteiro_has_reuniao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Escoteiro_idescoteiro', 'reuniao_idreuniao'], 'required'],
            [['Escoteiro_idescoteiro', 'reuniao_idreuniao'], 'integer'],
            [['Escoteiro_idescoteiro', 'reuniao_idreuniao'], 'unique', 'targetAttribute' => ['Escoteiro_idescoteiro', 'reuniao_idreuniao']],
            [['Escoteiro_idescoteiro'], 'exist', 'skipOnError' => true, 'targetClass' => Escoteiro::className(), 'targetAttribute' => ['Escoteiro_idescoteiro' => 'idescoteiro']],
            [['reuniao_idreuniao'], 'exist', 'skipOnError' => true, 'targetClass' => Reuniao::className(), 'targetAttribute' => ['reuniao_idreuniao' => 'idreuniao']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Escoteiro_idescoteiro' => Yii::t('app', 'Escoteiro Idescoteiro'),
            'reuniao_idreuniao' => Yii::t('app', 'Reuniao Idreuniao'),
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
    public function getReuniaoIdreuniao()
    {
        return $this->hasOne(Reuniao::className(), ['idreuniao' => 'reuniao_idreuniao']);
    }
}
