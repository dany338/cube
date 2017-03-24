<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Cube]].
 *
 * @see Cube
 */
class CubeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Cube[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Cube|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
