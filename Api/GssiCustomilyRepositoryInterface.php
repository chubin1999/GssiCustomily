<?php
namespace AHT\GssiCustomily\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface GssiCustomilyRepositoryInterface
{
    /**
     * Get object by id
     *
     * @return \AHT\GssiCustomily\Api\Data\GssiCustomilyInterface
     */
    public function getById(String $id);

    /**
     * Get All
     * 
     * @return \AHT\GssiCustomily\Api\Data\GssiCustomilyInterface
     */
    public function getList();

     /**
     * Get store list by search criteria
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \AHT\GssiCustomily\Api\Data\StoreSearchResultsInterface
     */
    public function getPriceBySearchCriteria(SearchCriteriaInterface $searchCriteria);

    /**
     * Get all Price
     *
     * @return \AHT\GssiCustomily\Api\Data\GssiCustomilyInterface
     */
    public function getPriceAll();

    /**
     * Get Price by Id
     *
     * @return \AHT\GssiCustomily\Api\Data\GssiCustomilyInterface
     */
    public function getPriceId(String $id);

    /**
     * Get Price by Sku
     *
     * @return \AHT\GssiCustomily\Api\Data\GssiCustomilyInterface
     */
    public function getPriceSku(String $sku);

}