<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "matilha".
 *
 * @property int $idmatilha
 * @property string $nome
 * @property int $alcateia_secao_idsecao
 *
 * @property Alcateia $alcateiaSecaoIdsecao
 * @property MatilhaHasEscoteiro[] $matilhaHasEscoteiros
 * @property Escoteiro[] $escoteiroIdescoteiros
 */
class Matilha extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matilha';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'alcateia_secao_idsecao'], 'required'],
            [['alcateia_secao_idsecao'], 'integer'],
            [['nome'], 'string', 'max' => 45],
            [['alcateia_secao_idsecao'], 'exist', 'skipOnError' => true, 'targetClass' => Alcateia::className(), 'targetAttribute' => ['alcateia_secao_idsecao' => 'secao_idsecao']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idmatilha' => Yii::t('app', 'Idmatilha'),
            'nome' => Yii::t('app', 'Nome'),
            'alcateia_secao_idsecao' => Yii::t('app', 'Alcateia Secao Idsecao'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlcateiaSecaoIdsecao()
    {
        return $this->hasOne(Alcateia::className(), ['secao_idsecao' => 'alcateia_secao_idsecao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatilhaHasEscoteiros()
    {
        return $this->hasMany(MatilhaHasEscoteiro::className(), ['matilha_idmatilha' => 'idmatilha']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEscoteiroIdescoteiros()
    {
        return $this->hasMany(Escoteiro::className(), ['idescoteiro' => 'Escoteiro_idescoteiro'])->viaTable('matilha_has_Escoteiro', ['matilha_idmatilha' => 'idmatilha']);
    }
}
