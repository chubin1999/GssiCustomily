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
     * Get object by sku
     *
     * @return \AHT\GssiCustomily\Api\Data\GssiCustomilyInterface
     */
    public function getPriceBySku($sku);
}