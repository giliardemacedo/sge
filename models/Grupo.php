<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grupo".
 *
 * @property int $idgrupo
 * @property string $nome
 * @property string $numeral
 *
 * @property Caixa[] $caixas
 * @property Reuniao[] $reuniaos
 * @property Secao[] $secaos
 */
class Grupo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'grupo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'numeral'], 'required'],
            [['nome'], 'string', 'max' => 60],
            [['numeral'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idgrupo' => Yii::t('app', 'Idgrupo'),
            'nome' => Yii::t('app', 'Nome'),
            'numeral' => Yii::t('app', 'Numeral'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaixas()
    {
        return $this->hasMany(Caixa::className(), ['idgrupo' => 'idgrupo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReuniaos()
    {
        return $this->hasMany(Reuniao::className(), ['idgrupo' => 'idgrupo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSecaos()
    {
        return $this->hasMany(Secao::className(), ['idgrupo' => 'idgrupo']);
    }
}
