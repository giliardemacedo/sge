<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tropa".
 *
 * @property int $secao_idsecao
 * @property string $nome
 *
 * @property Patrulha[] $patrulhas
 * @property Secao $secaoIdsecao
 */
class Tropa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tropa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['secao_idsecao', 'nome'], 'required'],
            [['secao_idsecao'], 'integer'],
            [['nome'], 'string', 'max' => 40],
            [['secao_idsecao'], 'unique'],
            [['secao_idsecao'], 'exist', 'skipOnError' => true, 'targetClass' => Secao::className(), 'targetAttribute' => ['secao_idsecao' => 'idsecao']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'secao_idsecao' => Yii::t('app', 'Seção'),
            'nome' => Yii::t('app', 'Nome'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatrulhas()
    {
        return $this->hasMany(Patrulha::className(), ['tropa_secao_idsecao' => 'secao_idsecao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSecaoIdsecao()
    {
        return $this->hasOne(Secao::className(), ['idsecao' => 'secao_idsecao']);
    }
}
