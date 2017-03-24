<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cube".
 *
 * @property integer $id
 * @property integer $idProfile
 * @property integer $cordX
 * @property integer $cordY
 * @property integer $cordZ
 * @property integer $vlrW
 *
 * @property Detalleprueba[] $detallepruebas
 * @property Detalleprueba[] $detallepruebas0
 */
class Cube extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cube';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idProfile'], 'required'],
            [['idProfile', 'cordX', 'cordY', 'cordZ', 'vlrW'], 'integer'],
            [['cordX', 'cordY', 'cordZ'], 'unique', 'targetAttribute' => ['cordX', 'cordY', 'cordZ'], 'message' => 'The combination of X, Y and Z has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'idProfile' => Yii::t('yii', 'Id Profile'),
            'cordX' => Yii::t('yii', 'X'),
            'cordY' => Yii::t('yii', 'Y'),
            'cordZ' => Yii::t('yii', 'Z'),
            'vlrW' => Yii::t('yii', 'W'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallepruebas()
    {
        return $this->hasMany(Detalleprueba::className(), ['idCube1' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallepruebas0()
    {
        return $this->hasMany(Detalleprueba::className(), ['idCube2' => 'id']);
    }

    /**
     * @inheritdoc
     * @return CubeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CubeQuery(get_called_class());
    }
}
