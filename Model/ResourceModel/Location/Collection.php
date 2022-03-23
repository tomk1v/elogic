<?php
/**
 * Store Locator
 * The collection model is considered a resource model which allow us to filter and fetch a collection table data
 *
 * @category  Learning
 * @package   Learning\StoreLocator
 * @author    Andrii Tomkiv <tomkivandrii18@gmail.com>
 * @copyright 2022 Elogic
 */

namespace Learning\StoreLocator\Model\ResourceModel\Location;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Learning\StoreLocator\Model\Location as Model;
use Learning\StoreLocator\Model\ResourceModel\Location as ResourceModel;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = Model::KEY_ID;

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
