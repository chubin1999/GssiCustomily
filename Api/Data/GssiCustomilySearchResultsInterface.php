<?php

namespace AHT\GssiCustomily\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface GssiCustomilySearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * Get attributes list.
     *
     * @return AHT\GssiCustomily\Api\Data\StoreInterface[]
     */
    public function getItems();

    /**
     * Set attributes list.
     *
     * @param AHT\GssiCustomily\Api\Data\StoreInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}