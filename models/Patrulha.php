<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patrulha".
 *
 * @property int $idpatrulha
 * @property string $nome
 * @property string $gritodeguerra
 * @property int $tropa_secao_idsecao
 * @property string $tipo
 *
 * @property Tropa $tropaSecaoIdsecao
 * @property PatrulhaHasEscoteiro[] $patrulhaHasEscoteiros
 * @property Escoteiro[] $escoteiroIdescoteiros
 */
class Patrulha extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'patrulha';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'tropa_secao_idsecao'], 'required'],
            [['gritodeguerra'], 'string'],
            [['tropa_secao_idsecao'], 'integer'],
            [['nome'], 'string', 'max' => 60],
            [['tipo'], 'string', 'max' => 45],
            [['tropa_secao_idsecao'], 'exist', 'skipOnError' => true, 'targetClass' => Tropa::className(), 'targetAttribute' => ['tropa_secao_idsecao' => 'secao_idsecao']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpatrulha' => Yii::t('app', 'Patrulha'),
            'nome' => Yii::t('app', 'Nome'),
            'gritodeguerra' => Yii::t('app', 'Grito de Guerra'),
            'tropa_secao_idsecao' => Yii::t('app', 'Tropa'),
            'tipo' => Yii::t('app', 'Tipo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTropaSecaoIdsecao()
    {
        return $this->hasOne(Tropa::className(), ['secao_idsecao' => 'tropa_secao_idsecao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatrulhaHasEscoteiros()
    {
        return $this->hasMany(PatrulhaHasEscoteiro::className(), ['patrulha_idpatrulha' => 'idpatrulha']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEscoteiroIdescoteiros()
    {
        return $this->hasMany(Escoteiro::className(), ['idescoteiro' => 'Escoteiro_idescoteiro'])->viaTable('patrulha_has_Escoteiro', ['patrulha_idpatrulha' => 'idpatrulha']);
    }
}
