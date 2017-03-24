<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Detalleprueba]].
 *
 * @see Detalleprueba
 */
class DetallepruebaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Detalleprueba[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Detalleprueba|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
