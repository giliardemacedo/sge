<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Escoteiro_has_flordelis".
 *
 * @property int $Escoteiro_idescoteiro
 * @property int $flordelis_secao_idsecao
 *
 * @property Escoteiro $escoteiroIdescoteiro
 * @property Flordelis $flordelisSecaoIdsecao
 */
class EscoteiroHasFlordelis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Escoteiro_has_flordelis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Escoteiro_idescoteiro', 'flordelis_secao_idsecao'], 'required'],
            [['Escoteiro_idescoteiro', 'flordelis_secao_idsecao'], 'integer'],
            [['Escoteiro_idescoteiro', 'flordelis_secao_idsecao'], 'unique', 'targetAttribute' => ['Escoteiro_idescoteiro', 'flordelis_secao_idsecao']],
            [['Escoteiro_idescoteiro'], 'exist', 'skipOnError' => true, 'targetClass' => Escoteiro::className(), 'targetAttribute' => ['Escoteiro_idescoteiro' => 'idescoteiro']],
            [['flordelis_secao_idsecao'], 'exist', 'skipOnError' => true, 'targetClass' => Flordelis::className(), 'targetAttribute' => ['flordelis_secao_idsecao' => 'secao_idsecao']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Escoteiro_idescoteiro' => Yii::t('app', 'Escoteiro Idescoteiro'),
            'flordelis_secao_idsecao' => Yii::t('app', 'Flordelis Secao Idsecao'),
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
    public function getFlordelisSecaoIdsecao()
    {
        return $this->hasOne(Flordelis::className(), ['secao_idsecao' => 'flordelis_secao_idsecao']);
    }
}
