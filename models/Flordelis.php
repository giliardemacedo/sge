<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "flordelis".
 *
 * @property int $secao_idsecao
 * @property string $nome
 *
 * @property EscoteiroHasFlordelis[] $escoteiroHasFlordelis
 * @property Escoteiro[] $escoteiroIdescoteiros
 * @property Secao $secaoIdsecao
 */
class Flordelis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'flordelis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['secao_idsecao', 'nome'], 'required'],
            [['secao_idsecao'], 'integer'],
            [['nome'], 'string', 'max' => 45],
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
            'secao_idsecao' => Yii::t('app', 'Secao Idsecao'),
            'nome' => Yii::t('app', 'Nome'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEscoteiroHasFlordelis()
    {
        return $this->hasMany(EscoteiroHasFlordelis::className(), ['flordelis_secao_idsecao' => 'secao_idsecao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEscoteiroIdescoteiros()
    {
        return $this->hasMany(Escoteiro::className(), ['idescoteiro' => 'Escoteiro_idescoteiro'])->viaTable('Escoteiro_has_flordelis', ['flordelis_secao_idsecao' => 'secao_idsecao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSecaoIdsecao()
    {
        return $this->hasOne(Secao::className(), ['idsecao' => 'secao_idsecao']);
    }
}
