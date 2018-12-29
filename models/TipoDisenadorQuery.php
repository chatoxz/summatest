<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TipoDisenador]].
 *
 * @see TipoDisenador
 */
class TipoDisenadorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return TipoDisenador[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TipoDisenador|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
