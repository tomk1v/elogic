<?php
/**
 * Store Locator
 * Model class define logic for LocationRepositoryInterface methods
 *
 * @category  Learning
 * @package   Learning\StoreLocator
 * @author    Andrii Tomkiv <tomkivandrii18@gmail.com>
 * @copyright 2022 Elogic
 */

namespace Learning\StoreLocator\Model;

use Exception;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Exception\AlreadyExistsException;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchCriteriaInterface;
use Learning\StoreLocator\Api\Data\LocationInterface;
use Learning\StoreLocator\Api\Data\LocationSearchResultsInterface;
use Learning\StoreLocator\Api\LocationRepositoryInterface;
use Learning\StoreLocator\Model\ResourceModel\Location as LocationResourceModel;
use Learning\StoreLocator\Api\Data\LocationSearchResultsInterfaceFactory as SearchResultFactory;
use Learning\StoreLocator\Model\ResourceModel\Location\Collection;
use Learning\StoreLocator\Model\ResourceModel\Location\CollectionFactory;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;

class LocationRepository implements LocationRepositoryInterface
{
    /**
     * @var LocationResourceModel
     */
    private $resourceModel;

    /**
     * @var LocationFactory
     */
    private $locationFactory;

    /**
     * @var FilterBuilder
     */
    private $filterBuilder;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * @var SearchResultFactory
     */
    private $searchResultFactory;

    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * @var JoinProcessorInterface
     */
    private $joinProcessor;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @param LocationResourceModel $resourceModel
     * @param LocationFactory $locationFactory
     * @param FilterBuilder $filterBuilder
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param SearchResultFactory $searchResultFactory
     * @param CollectionFactory $collectionFactory
     * @param JoinProcessorInterface $joinProcessor
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        LocationResourceModel $resourceModel,
        LocationFactory $locationFactory,
        FilterBuilder $filterBuilder,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        SearchResultFactory $searchResultFactory,
        CollectionFactory $collectionFactory,
        JoinProcessorInterface $joinProcessor,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resourceModel = $resourceModel;
        $this->locationFactory = $locationFactory;
        $this->filterBuilder = $filterBuilder;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->searchResultFactory = $searchResultFactory;
        $this->collectionFactory = $collectionFactory;
        $this->joinProcessor = $joinProcessor;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @param int $locationId
     * @return LocationInterface
     */
    public function getById(int $locationId)
    {
        $model = $this->locationFactory->create();
        $this->resourceModel->load($model, $locationId);

        return $model;
    }

    /**
     * Delete Location
     *
     * @param LocationInterface|AbstractModel $location
     * @return bool
     * @throws Exception
     */
    public function delete(LocationInterface $location)
    {
        $this->resourceModel->delete($location);

        return true;
    }

    /**
     * Save Location
     *
     * @param LocationInterface|AbstractModel $location
     * @return LocationInterface $location
     * @throws AlreadyExistsException
     */
    public function save(LocationInterface $location)
    {
        $this->resourceModel->save($location);

        return $location;
    }

    /**
     * Delete Location
     *
     * @param int $locationId
     * @return bool
     * @throws Exception
     */
    public function deleteById(int $locationId)
    {
        $location = $this->getById($locationId);

        return $this->delete($location);
    }

    /**
     * Search Location
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return LocationSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $searchResult = $this->searchResultFactory->create();

        $collection = $this->collectionFactory->create();
        $this->joinProcessor->process($collection, LocationInterface::class);
        $this->collectionProcessor->process($searchCriteria, $collection);
        $searchResult->setSearchCriteria($searchCriteria);
        $searchResult->setTotalCount($collection->getSize());
        $searchResult->setItems($collection->getItems());

        return $searchResult;
    }
}
