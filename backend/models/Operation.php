<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "operation".
 *
 * @property integer $id
 * @property string $operation
 *
 * @property Detalleprueba[] $detallepruebas
 */
class Operation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'operation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['operation'], 'required'],
            [['operation'], 'string', 'max' => 45],
            [['operation'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'operation' => Yii::t('yii', 'Operación'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallepruebas()
    {
        return $this->hasMany(Detalleprueba::className(), ['idOperation' => 'id']);
    }

    /**
     * @inheritdoc
     * @return OperationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OperationQuery(get_called_class());
    }

    public static function getOperations()
    {
        $operations = Operation::find()->all();

        return ArrayHelper::map($operations, 'id', 'operation'); 
    }
}
