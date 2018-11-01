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
            'idatividade' => Yii::t('app', 'Idatividade'),
            'idarea_atuacao' => Yii::t('app', 'Idarea Atuacao'),
            'idsecao' => Yii::t('app', 'Idsecao'),
            'nome' => Yii::t('app', 'Nome'),
            'descricao' => Yii::t('app', 'Descricao'),
            'material' => Yii::t('app', 'Material'),
            'tempoduracao' => Yii::t('app', 'Tempoduracao'),
            'localaplicacao' => Yii::t('app', 'Localaplicacao'),
        ];
    }

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
