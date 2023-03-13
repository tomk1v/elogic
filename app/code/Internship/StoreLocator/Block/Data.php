<?php
/**
 * Store Locator
 * Block is used for .phtml files where you can fetch data for frontend
 *
 * @category  Internship
 * @package   Internship\StoreLocator
 * @author    Andrii Tomkiv <tomkivandrii18@gmail.com>
 * @copyright 2022 Elogic
 */

namespace Internship\StoreLocator\Block;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Internship\StoreLocator\Api\LocationRepositoryInterface;

class Data extends \Magento\Framework\View\Element\Template
{
    /**
     * Path for folder where images stored
     */
    const IMAGE_PATH = '/media/storelocator/image';

    /**
     * @var Context
     */
    protected $context;

    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCreteriaBuilder;

    /**
     * @var LocationRepositoryInterface
     */
    protected $locationRepository;

    /**
     * @param Context $context
     * @param LocationRepositoryInterface $locationRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param string $path
     * @param array $data
     */
    public function __construct(
        Context                                          $context,
        LocationRepositoryInterface                      $locationRepository,
        SearchCriteriaBuilder                            $searchCriteriaBuilder,
        $path = self::IMAGE_PATH,
        $data = []
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
     * @return \Internship\StoreLocator\Api\Data\LocationInterface[]
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
