<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "caixa".
 *
 * @property int $idcaixa
 * @property int $idgrupo
 * @property double $valor
 * @property string $data
 * @property string $responsavel
 * @property string $descricao
 * @property string $comprovante
 *
 * @property Grupo $grupo
 */
class Caixa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'caixa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idgrupo', 'valor', 'data', 'responsavel', 'descricao'], 'required'],
            [['idgrupo'], 'integer'],
            [['valor'], 'number'],
            [['data'], 'safe'],
            [['responsavel'], 'string', 'max' => 60],
            [['descricao'], 'string', 'max' => 80],
            [['comprovante'], 'string', 'max' => 50],
            [['idgrupo'], 'exist', 'skipOnError' => true, 'targetClass' => Grupo::className(), 'targetAttribute' => ['idgrupo' => 'idgrupo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idcaixa' => Yii::t('app', 'Idcaixa'),
            'idgrupo' => Yii::t('app', 'Idgrupo'),
            'valor' => Yii::t('app', 'Valor'),
            'data' => Yii::t('app', 'Data'),
            'responsavel' => Yii::t('app', 'Responsavel'),
            'descricao' => Yii::t('app', 'Descricao'),
            'comprovante' => Yii::t('app', 'Comprovante'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupo()
    {
        return $this->hasOne(Grupo::className(), ['idgrupo' => 'idgrupo']);
    }
}
