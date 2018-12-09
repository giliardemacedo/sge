<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "atividade".
 *
 * @property int $idatividade
 * @property int $idarea_atuacao
 * @property int $idsecao
 * @property string $nome
 * @property string $descricao
 * @property string $material
 * @property string $tempoduracao
 * @property string $localaplicacao Local apropriado para a aplicação da atividade.
 *
 * @property AreaAtuacao $areaAtuacao
 * @property Secao $secao
 */
class Atividade extends \yii\db\ActiveRecord
{
    private $qtdafetivo, $qtdespiritual, $qtdcarater, $qtdfisico, $qtdintelectual, $qtdsocial;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'atividade';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idarea_atuacao', 'idsecao', 'nome', 'descricao', 'material', 'tempoduracao', 'localaplicacao'], 'required'],
            [['idarea_atuacao', 'idsecao'], 'integer'],
            //Campos de Teste
            [['qtdafetivo', 'qtdespiritual', 'qtdcarater', 'qtdfisico', 'qtdintelectual', 'qtdsocial'], 'integer'],
            
            [['descricao', 'material'], 'string'],
            [['nome'], 'string', 'max' => 30],
            [['tempoduracao'], 'string', 'max' => 20],
            [['localaplicacao'], 'string', 'max' => 80],
            [['idarea_atuacao'], 'exist', 'skipOnError' => true, 'targetClass' => AreaAtuacao::className(), 'targetAttribute' => ['idarea_atuacao' => 'idarea_atuacao']],
            [['idsecao'], 'exist', 'skipOnError' => true, 'targetClass' => Secao::className(), 'targetAttribute' => ['idsecao' => 'idsecao']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idatividade' => Yii::t('app', 'Atividade'),
            'idarea_atuacao' => Yii::t('app', 'Área Atuação'),
            'idsecao' => Yii::t('app', 'Seção'),
            'nome' => Yii::t('app', 'Nome'),
            'descricao' => Yii::t('app', 'Descrição'),
            'material' => Yii::t('app', 'Material'),
            'tempoduracao' => Yii::t('app', 'Tempo de Duração'),
            'localaplicacao' => Yii::t('app', 'Local de Aplicação'),
        ];
    }

    public function getQtdAfetivo(){
        return $this->qtdafetivo;
    }
    public function setQtdAfetivo($value){
        $this->qtdafetivo = $value;
    }
    public function getQtdCarater(){
        return $this->qtdcarater;
    }

    public function setQtdCarater($value){
        $this->qtdcarater = $value;
    }
    public function getQtdEspiritual(){
        return $this->qtdespiritual;
    }

    public function setQtdEspiritual($value){
        $this->qtdespiritual = $value;
    }
    public function getQtdFisico(){
        return $this->qtdfisico;
    }

    public function setQtdFisico($value){
        $this->qtdfisico = $value;
    }
    public function getQtdIntelectual(){
        return $this->qtdintelectual;
    }

    public function setQtdIntelectual($value){
        $this->qtdintelectual = $value;
    }
    public function getQtdSocial(){
        return $this->qtdsocial;
    }

    public function setQtdSocial($value){
        $this->qtdsocial = $value;
    }

    /*
    public function getQuantidade(){
        return $this->quantidade;
    }

    public function setQuantidade($value){
        $this->quantidade['qtdafetivo'] = $value;
    }*/

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAreaAtuacao()
    {
        return $this->hasOne(AreaAtuacao::className(), ['idarea_atuacao' => 'idarea_atuacao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSecao()
    {
        return $this->hasOne(Secao::className(), ['idsecao' => 'idsecao']);
    }
}
