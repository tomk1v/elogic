<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Learning\StoreLocator\Block;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Learning\StoreLocator\Api\LocationRepositoryInterface;

class Data extends \Magento\Framework\View\Element\Template
{
    const IMAGE_PATH = '/media/storelocator/image';

    protected $context;

    private $searchCreteriaBuilder;

    protected $locationRepository;

    public function __construct(
        Context                                          $context,
        LocationRepositoryInterface                      $locationRepository,
        \Magento\Framework\Api\SearchCriteriaBuilder     $searchCriteriaBuilder,
                                                         $data = [],
        $path = self::IMAGE_PATH
    )
    {
        $this->context = $context;
        $this->locationRepository = $locationRepository;
        $this->searchCreteriaBuilder = $searchCriteriaBuilder;
        $this->path = $path;
        parent::__construct($context, $data);
    }

    /**
     * Gets data from database in array
     *
     * @return \Learning\StoreLocator\Api\Data\LocationInterface[]
     */
    public function getCollection()
    {
        $location = $this->locationRepository->getList($this->searchCreteriaBuilder->create());

        return $location->getItems();
    }

    /**
     * Retrieve path
     *
     * @param string $imageName
     *
     * @return string
     */
    public function getFilePath($imageName)
    {
        return $this->path . '/' . ltrim($imageName, '/');
    }

    /**
     * Generate url by route and parameters
     *
     * @param string $route
     * @param array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }


}
