<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Prueba]].
 *
 * @see Prueba
 */
class PruebaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Prueba[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Prueba|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
