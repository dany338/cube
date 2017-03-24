<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "caso".
 *
 * @property integer $id
 * @property integer $nroCasos
 *
 * @property Prueba[] $pruebas
 */
class Caso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'caso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nroCasos'], 'required'],
            [['nroCasos'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'nroCasos' => Yii::t('yii', '(T)'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPruebas()
    {
        return $this->hasMany(Prueba::className(), ['idCaso' => 'id']);
    }

    /**
     * @inheritdoc
     * @return CasoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CasoQuery(get_called_class());
    }
}
