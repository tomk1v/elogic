<?php
/**
 * Store Locator
 * API Data interface where is declared all getters and setter. Data Transfer Object interface
 *
 * @category  Learning
 * @package   Learning\StoreLocator
 * @author    Andrii Tomkiv <tomkivandrii18@gmail.com>
 * @copyright 2022 Elogic
 */

namespace Learning\StoreLocator\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface LocationInterface extends ExtensibleDataInterface
{
    const KEY_ID          = 'id';
    const KEY_NAME        = 'name';
    const KEY_DESCRIPTION = 'description';
    const KEY_OPEN_TIME   = 'open_time';
    const KEY_CLOSE_TIME  = 'close_time';
    const KEY_LATITUDE    = 'latitude';
    const KEY_LONGITUDE   = 'longitude';
    const KEY_PATH        = 'image_path';

    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name);

    /**
     * @return string
     */
    public function getDescription(): string;

    /**
     * @param string $description
     * @return void
     */
    public function setDescription(string $description);

    /**
     * @return string
     */
    public function getOpenTime(): string;

    /**
     * @param string $openTime
     * @return void
     */
    public function setOpenTime(string $openTime);

    /**
     * @return string
     */
    public function getCloseTime(): string;

    /**
     * @param string $closeTime
     * @return void
     */
    public function setCloseTime(string $closeTime);

    /**
     * @return string
     */
    public function getLatitude(): string;

    /**
     * @param string $latitude
     * @return void
     */
    public function setLatitude(string $latitude);

    /**
     * @return string
     */
    public function getLongitude(): string;

    /**
     * @param string $longitude
     * @return void
     */
    public function setLongitude(string $longitude);

    /**
     * @return string
     */
    public function getPath(): string;

    /**
     * @param string $path
     * @return void
     */
    public function setPath(string $path);

    /**
     * @return \Learning\StoreLocator\Api\Data\LocationExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * @param \Learning\StoreLocator\Api\Data\LocationExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(\Learning\StoreLocator\Api\Data\LocationExtensionInterface $extensionAttributes);
}
