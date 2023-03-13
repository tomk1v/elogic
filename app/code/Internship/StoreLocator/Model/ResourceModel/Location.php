<?php
/**
 * Store Locator
 * Model class execute sql queries.
 *
 * @category  Internship
 * @package   Internship\StoreLocator
 * @author    Andrii Tomkiv <tomkivandrii18@gmail.com>
 * @copyright 2022 Elogic
 */

namespace Internship\StoreLocator\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Internship\StoreLocator\Model\Location as Model;

class Location extends AbstractDb
{
    /**
     *  Name of database
     */
    const MAIN_TABLE = 'store_location';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(self::MAIN_TABLE, Model::KEY_ID);
    }
}
