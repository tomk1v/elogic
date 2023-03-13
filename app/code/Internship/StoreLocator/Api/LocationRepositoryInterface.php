<?php
/**
 * Store Locator
 * API Repository Interface. Repository use the methods
 * getById, deleteById, save, delete, and getList, but you can add any other
 *
 * @category  Internship
 * @package   Internship\StoreLocator
 * @author    Andrii Tomkiv <tomkivandrii18@gmail.com>
 * @copyright 2022 Elogic
 */

namespace Internship\StoreLocator\Api;

use Exception;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\AlreadyExistsException;
use Internship\StoreLocator\Api\Data\LocationInterface;
use Internship\StoreLocator\Api\Data\LocationSearchResultsInterface;

interface LocationRepositoryInterface
{
    /**
     * @param int $locationId
     * @return LocationInterface
     */
    public function getById(int $locationId);

    /**
     * @param LocationInterface $location
     * @return bool
     * @throws Exception
     */
    public function delete(LocationInterface $location);

    /**
     * @param LocationInterface $location
     * @return LocationInterface $location
     * @throws AlreadyExistsException
     */
    public function save(LocationInterface $location);

    /**
     * @param int $locationId
     * @return bool
     * @throws Exception
     */
    public function deleteById(int $locationId);

    /**
     * Search Location
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return LocationSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}
