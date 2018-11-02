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
            [['descricao'], 'string'],
            [['responsavel'], 'string', 'max' => 60],
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
            'idcaixa' => Yii::t('app', 'Caixa'),
            'idgrupo' => Yii::t('app', 'Grupo'),
            'valor' => Yii::t('app', 'Valor'),
            'data' => Yii::t('app', 'Data'),
            'responsavel' => Yii::t('app', 'Responsável'),
            'descricao' => Yii::t('app', 'Descrição'),
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
