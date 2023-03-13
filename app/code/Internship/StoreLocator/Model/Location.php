<?php
/**
 * Store Locator
 * Model class define the getIdentities() method which will return a unique id for the model.
 * Also, logic for getters and setters.
 *
 * @category  Internship
 * @package   Internship\StoreLocator
 * @author    Andrii Tomkiv <tomkivandrii18@gmail.com>
 * @copyright 2022 Elogic
 */

namespace Internship\StoreLocator\Model;

use Internship\StoreLocator\Model\ResourceModel\Location as ResourceModel;
use Internship\StoreLocator\Api\Data\LocationInterface;
use Internship\StoreLocator\Api\Data\LocationExtensionInterface;
use Magento\Framework\Model\AbstractExtensibleModel;

class Location extends AbstractExtensibleModel implements LocationInterface
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'store_location';

    /**
     * @var string
     */
    protected $_eventObject = 'location';

    /**
     * @var string
     */
    protected $_idFieldName = self::KEY_ID;

    /**
     * CMS page cache tag
     */
    const CACHE_TAG = 'store_location';

    /**
     * Model cache tag for clear cache in after save and after delete
     *
     * @var string
     */
    protected $_cacheTag = self::CACHE_TAG;

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * Return unique ID(s) for each object in system
     *
     * @return string[]
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->getData(self::KEY_ID);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->getData(self::KEY_NAME);
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name)
    {
        $this->setData(self::KEY_NAME, $name);
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->getData(self::KEY_DESCRIPTION);
    }

    /**
     * @param string $description
     * @return void
     */
    public function setDescription(string $description)
    {
        $this->setData(self::KEY_DESCRIPTION, $description);
    }

    /**
     * @return string
     */
    public function getOpenTime(): string
    {
        return $this->getData(self::KEY_OPEN_TIME);
    }

    /**
     * @param string $openTime
     * @return void
     */
    public function setOpenTime(string $openTime)
    {
        $this->setData(self::KEY_OPEN_TIME, $openTime);
    }

    /**
     * @return string
     */
    public function getCloseTime(): string
    {
        return $this->getData(self::KEY_CLOSE_TIME);
    }

    /**
     * @param string $closeTime
     * @return void
     */
    public function setCloseTime(string $closeTime)
    {
        $this->setData(self::KEY_CLOSE_TIME, $closeTime);
    }

    /**
     * @return string
     */
    public function getLatitude(): string
    {
        return $this->getData(self::KEY_LATITUDE);
    }

    /**
     * @param string $latitude
     * @return void
     */
    public function setLatitude(string $latitude)
    {
        $this->setData(self::KEY_LATITUDE, $latitude);
    }

    /**
     * @return string
     */
    public function getLongitude(): string
    {
        return $this->getData(self::KEY_LONGITUDE);
    }

    /**
     * @param string $longitude
     * @return void
     */
    public function setLongitude(string $longitude)
    {
        $this->setData(self::KEY_LONGITUDE, $longitude);
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->getData(self::KEY_PATH);
    }

    /**
     * @param string $path
     * @return void
     */
    public function setPath(string $path)
    {
        $this->setData(self::KEY_PATH, $path);
    }


    /**
     * @return LocationExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * @param \Internship\StoreLocator\Api\Data\LocationExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(\Internship\StoreLocator\Api\Data\LocationExtensionInterface $extensionAttributes)
    {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}
