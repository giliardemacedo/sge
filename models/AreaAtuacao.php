<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "area_atuacao".
 *
 * @property int $idarea_atuacao
 * @property string $nome Ao cadastras as atividades, o chefe  responsável poderá escolher uma das seguintes áreas de desenvolvimento: afetivo, caráter, espiritual, físico, intelectual, social.
 *
 * @property Atividade[] $atividades
 */
class AreaAtuacao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'area_atuacao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idarea_atuacao' => Yii::t('app', 'Idarea Atuacao'),
            'nome' => Yii::t('app', 'Nome'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtividades()
    {
        return $this->hasMany(Atividade::className(), ['idarea_atuacao' => 'idarea_atuacao']);
    }
}
