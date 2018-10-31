<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "secao".
 *
 * @property int $idsecao
 * @property int $idgrupo
 * @property string $nome
 *
 * @property Alcateia $alcateia
 * @property Atividade[] $atividades
 * @property Cla $cla
 * @property Flordelis $flordelis
 * @property Grupo $grupo
 * @property Tropa $tropa
 */
class Secao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'secao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idgrupo', 'nome'], 'required'],
            [['idgrupo'], 'integer'],
            [['nome'], 'string', 'max' => 60],
            [['idgrupo'], 'exist', 'skipOnError' => true, 'targetClass' => Grupo::className(), 'targetAttribute' => ['idgrupo' => 'idgrupo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idsecao' => Yii::t('app', 'Idsecao'),
            'idgrupo' => Yii::t('app', 'Idgrupo'),
            'nome' => Yii::t('app', 'Nome'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlcateia()
    {
        return $this->hasOne(Alcateia::className(), ['secao_idsecao' => 'idsecao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtividades()
    {
        return $this->hasMany(Atividade::className(), ['idsecao' => 'idsecao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCla()
    {
        return $this->hasOne(Cla::className(), ['secao_idsecao' => 'idsecao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlordelis()
    {
        return $this->hasOne(Flordelis::className(), ['secao_idsecao' => 'idsecao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupo()
    {
        return $this->hasOne(Grupo::className(), ['idgrupo' => 'idgrupo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTropa()
    {
        return $this->hasOne(Tropa::className(), ['secao_idsecao' => 'idsecao']);
    }
}
