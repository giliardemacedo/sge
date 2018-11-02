<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Escoteiro".
 *
 * @property int $idescoteiro
 * @property string $nome
 * @property string $nascimento
 * @property string $cpf
 * @property string $rg
 * @property string $sexo
 * @property string $registroueb
 * @property int $estado
 * @property int $chefe
 * @property string $categoriaChefe
 *
 * @property EscoteiroHasFlordelis[] $escoteiroHasFlordelis
 * @property Flordelis[] $flordelisSecaoIdsecaos
 * @property EscoteiroHasReuniao[] $escoteiroHasReuniaos
 * @property Reuniao[] $reuniaoIdreuniaos
 * @property ClaHasEscoteiro[] $claHasEscoteiros
 * @property Cla[] $claSecaoIdsecaos
 * @property Contato[] $contatos
 * @property Endereco[] $enderecos
 * @property MatilhaHasEscoteiro[] $matilhaHasEscoteiros
 * @property Matilha[] $matilhaIdmatilhas
 * @property PatrulhaHasEscoteiro[] $patrulhaHasEscoteiros
 * @property Patrulha[] $patrulhaIdpatrulhas
 */
class Escoteiro extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Escoteiro';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'nascimento', 'cpf', 'rg', 'sexo', 'registroueb', 'estado'], 'required'],
            [['nascimento'], 'safe'],
            //[['estado', 'chefe'], 'integer'],
            [['chefe'], 'integer'],
            [['nome'], 'string', 'max' => 60],
            [['cpf', 'rg'], 'string', 'max' => 20],
            //[['sexo'], 'string', 'max' => 1],
            [['registroueb'], 'string', 'max' => 35],
            [['categoriaChefe'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idescoteiro' => Yii::t('app', 'Escoteiro'),
            'nome' => Yii::t('app', 'Nome'),
            'nascimento' => Yii::t('app', 'Nascimento'),
            'cpf' => Yii::t('app', 'Cpf'),
            'rg' => Yii::t('app', 'Rg'),
            'sexo' => Yii::t('app', 'Sexo'),
            'registroueb' => Yii::t('app', 'Registroueb'),
            'estado' => Yii::t('app', 'Estado'),
            'chefe' => Yii::t('app', 'Chefe'),
            'categoriaChefe' => Yii::t('app', 'Categoria Chefe'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEscoteiroHasFlordelis()
    {
        return $this->hasMany(EscoteiroHasFlordelis::className(), ['Escoteiro_idescoteiro' => 'idescoteiro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlordelisSecaoIdsecaos()
    {
        return $this->hasMany(Flordelis::className(), ['secao_idsecao' => 'flordelis_secao_idsecao'])->viaTable('Escoteiro_has_flordelis', ['Escoteiro_idescoteiro' => 'idescoteiro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEscoteiroHasReuniaos()
    {
        return $this->hasMany(EscoteiroHasReuniao::className(), ['Escoteiro_idescoteiro' => 'idescoteiro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReuniaoIdreuniaos()
    {
        return $this->hasMany(Reuniao::className(), ['idreuniao' => 'reuniao_idreuniao'])->viaTable('Escoteiro_has_reuniao', ['Escoteiro_idescoteiro' => 'idescoteiro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClaHasEscoteiros()
    {
        return $this->hasMany(ClaHasEscoteiro::className(), ['Escoteiro_idescoteiro' => 'idescoteiro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClaSecaoIdsecaos()
    {
        return $this->hasMany(Cla::className(), ['secao_idsecao' => 'cla_secao_idsecao'])->viaTable('cla_has_Escoteiro', ['Escoteiro_idescoteiro' => 'idescoteiro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContatos()
    {
        return $this->hasMany(Contato::className(), ['Escoteiro_idescoteiro' => 'idescoteiro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnderecos()
    {
        return $this->hasMany(Endereco::className(), ['Escoteiro_idescoteiro' => 'idescoteiro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatilhaHasEscoteiros()
    {
        return $this->hasMany(MatilhaHasEscoteiro::className(), ['Escoteiro_idescoteiro' => 'idescoteiro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatilhaIdmatilhas()
    {
        return $this->hasMany(Matilha::className(), ['idmatilha' => 'matilha_idmatilha'])->viaTable('matilha_has_Escoteiro', ['Escoteiro_idescoteiro' => 'idescoteiro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatrulhaHasEscoteiros()
    {
        return $this->hasMany(PatrulhaHasEscoteiro::className(), ['Escoteiro_idescoteiro' => 'idescoteiro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatrulhaIdpatrulhas()
    {
        return $this->hasMany(Patrulha::className(), ['idpatrulha' => 'patrulha_idpatrulha'])->viaTable('patrulha_has_Escoteiro', ['Escoteiro_idescoteiro' => 'idescoteiro']);
    }
}
