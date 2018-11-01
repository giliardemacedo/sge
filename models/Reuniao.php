<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reuniao".
 *
 * @property int $idreuniao
 * @property int $idgrupo
 * @property string $data
 * @property string $pauta
 *
 * @property EscoteiroHasReuniao[] $escoteiroHasReuniaos
 * @property Escoteiro[] $escoteiroIdescoteiros
 * @property Grupo $grupo
 */
class Reuniao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reuniao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idgrupo', 'data', 'pauta'], 'required'],
            [['idgrupo'], 'integer'],
            [['data'], 'safe'],
            [['pauta'], 'string'],
            [['idgrupo'], 'exist', 'skipOnError' => true, 'targetClass' => Grupo::className(), 'targetAttribute' => ['idgrupo' => 'idgrupo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idreuniao' => Yii::t('app', 'Idreuniao'),
            'idgrupo' => Yii::t('app', 'Idgrupo'),
            'data' => Yii::t('app', 'Data'),
            'pauta' => Yii::t('app', 'Pauta'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEscoteiroHasReuniaos()
    {
        return $this->hasMany(EscoteiroHasReuniao::className(), ['reuniao_idreuniao' => 'idreuniao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEscoteiroIdescoteiros()
    {
        return $this->hasMany(Escoteiro::className(), ['idescoteiro' => 'Escoteiro_idescoteiro'])->viaTable('Escoteiro_has_reuniao', ['reuniao_idreuniao' => 'idreuniao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupo()
    {
        return $this->hasOne(Grupo::className(), ['idgrupo' => 'idgrupo']);
    }
}
