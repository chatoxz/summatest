<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Empleado]].
 *
 * @see Empleado
 */
class EmpleadoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Empleado[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Empleado|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
