<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "prueba".
 *
 * @property integer $id
 * @property integer $idCaso
 * @property integer $tamanio
 * @property integer $nroOperaciones
 *
 * @property Detalleprueba[] $detallepruebas
 * @property Caso $idCaso0
 */
class Prueba extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prueba';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idCaso', 'tamanio', 'nroOperaciones'], 'integer'],
            [['idCaso'], 'exist', 'skipOnError' => true, 'targetClass' => Caso::className(), 'targetAttribute' => ['idCaso' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'idCaso' => Yii::t('yii', '(T)'),
            'tamanio' => Yii::t('yii', '(N)'),
            'nroOperaciones' => Yii::t('yii', '(M)'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallepruebas()
    {
        return $this->hasMany(Detalleprueba::className(), ['idPrueba' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCaso0()
    {
        return $this->hasOne(Caso::className(), ['id' => 'idCaso']);
    }

    /**
     * @inheritdoc
     * @return PruebaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PruebaQuery(get_called_class());
    }
}
