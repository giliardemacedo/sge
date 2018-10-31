<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cla_has_Escoteiro".
 *
 * @property int $cla_secao_idsecao
 * @property int $Escoteiro_idescoteiro
 *
 * @property Escoteiro $escoteiroIdescoteiro
 * @property Cla $claSecaoIdsecao
 */
class ClaHasEscoteiro extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cla_has_Escoteiro';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cla_secao_idsecao', 'Escoteiro_idescoteiro'], 'required'],
            [['cla_secao_idsecao', 'Escoteiro_idescoteiro'], 'integer'],
            [['cla_secao_idsecao', 'Escoteiro_idescoteiro'], 'unique', 'targetAttribute' => ['cla_secao_idsecao', 'Escoteiro_idescoteiro']],
            [['Escoteiro_idescoteiro'], 'exist', 'skipOnError' => true, 'targetClass' => Escoteiro::className(), 'targetAttribute' => ['Escoteiro_idescoteiro' => 'idescoteiro']],
            [['cla_secao_idsecao'], 'exist', 'skipOnError' => true, 'targetClass' => Cla::className(), 'targetAttribute' => ['cla_secao_idsecao' => 'secao_idsecao']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cla_secao_idsecao' => Yii::t('app', 'Cla Secao Idsecao'),
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
    public function getClaSecaoIdsecao()
    {
        return $this->hasOne(Cla::className(), ['secao_idsecao' => 'cla_secao_idsecao']);
    }
}
