<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Learning\StoreLocator\Model\Location;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Learning\StoreLocator\Api\Data\LocationInterface;
use Learning\StoreLocator\Model\ResourceModel\Location\Collection;
use Learning\StoreLocator\Model\ResourceModel\Location\CollectionFactory;
use Learning\StoreLocator\Model\Location;
use Magento\Store\Model\StoreManagerInterface;

class DataProvider extends AbstractDataProvider
{
    /**
     * @var Collection
     */
    protected $collection;

    /**
     * @var array
     */
    protected $loadedData;


    protected $storeManager;

    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        StoreManagerInterface $storeManager,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        $this->storeManager = $storeManager;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();

        /** @var LocationInterface|Location $location */
        foreach ($items as $location) {
            $mediaUrl = $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA );
            if (isset($data['image'])) {
                $name = $data['image'];
                unset($data['image']);
                $data['image'][0] = [
                    'name' => $name,
                    'url' => $mediaUrl.'storelocator/image/'.$name
                ];
            }
            $this->loadedData[$location->getId()] = $location->getData();
        }

        return $this->loadedData;
    }
}
