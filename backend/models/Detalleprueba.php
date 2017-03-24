<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "detalleprueba".
 *
 * @property integer $id
 * @property integer $idPrueba
 * @property integer $idOperation
 * @property integer $cordX1
 * @property integer $cordY1
 * @property integer $cordZ1
 * @property integer $cordX2
 * @property integer $cordY2
 * @property integer $cordZ2
 * @property integer $vlrW
 * @property integer $resultado
 *
 * @property Operation $idOperation0
 * @property Prueba $idPrueba0
 */
class Detalleprueba extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detalleprueba';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idPrueba', 'idOperation', 'cordX1', 'cordY1', 'cordZ1'], 'required'],
            [['idPrueba', 'idOperation', 'cordX1', 'cordY1', 'cordZ1', 'cordX2', 'cordY2', 'cordZ2', 'vlrW', 'resultado'], 'integer'],
            [['idOperation'], 'exist', 'skipOnError' => true, 'targetClass' => Operation::className(), 'targetAttribute' => ['idOperation' => 'id']],
            [['idPrueba'], 'exist', 'skipOnError' => true, 'targetClass' => Prueba::className(), 'targetAttribute' => ['idPrueba' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'idPrueba' => Yii::t('yii', 'Prueba'),
            'idOperation' => Yii::t('yii', 'Operación'),
            'cordX1' => Yii::t('yii', 'x1'),
            'cordY1' => Yii::t('yii', 'y1'),
            'cordZ1' => Yii::t('yii', 'z1'),
            'cordX2' => Yii::t('yii', 'x2'),
            'cordY2' => Yii::t('yii', 'y2'),
            'cordZ2' => Yii::t('yii', 'z2'),
            'vlrW' => Yii::t('yii', 'W'),
            'resultado' => Yii::t('yii', 'Salida:'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdOperation0()
    {
        return $this->hasOne(Operation::className(), ['id' => 'idOperation']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPrueba0()
    {
        return $this->hasOne(Prueba::className(), ['id' => 'idPrueba']);
    }

    /**
     * @inheritdoc
     * @return DetallepruebaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DetallepruebaQuery(get_called_class());
    }
}
