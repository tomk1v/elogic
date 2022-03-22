<?php

namespace Learning\StoreLocator\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Learning\StoreLocator\Model\Location as Model;

class Location extends AbstractDb
{
    const MAIN_TABLE = 'learning_store_location';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(self::MAIN_TABLE, Model::KEY_ID);
    }
}
