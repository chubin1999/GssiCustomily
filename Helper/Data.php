<?php
namespace AHT\GssiCustomily\Helper;

use AHT\GssiCustomily\Model\ResourceModel\GssiCustomily\CollectionFactory;

class Data
{
	private $_price;

    private $_collection;

    protected $collectionFactory;

    public function __construct(
        CollectionFactory $collectionFactory
    ) {
        $this->collectionFactory = $collectionFactory;
    }

	public function getPriceSkuPersonalizationCodeQty(array $array)
    {
        $this->_price = $array;
        $collection = $this->collectionFactory->create();

        $this->_collection = $collection;
        $this->toFilterLike('sku');
        $this->toFilterLike('personalizationcode');
        $this->toFilterLike('qty');

        foreach ($collection as $key => $value) {
            $price = $value->getPrice();
            echo "<pre>";
            var_dump($price);
        }
        // echo "<pre>";
        // var_dump($price);
        return $price;
    }

    public function toFilterLike(String $field)
    {
        if (isset($this->_price[$field])) {
            $this->_collection->addFieldToFilter($field, ['like' => '%' . $this->_price[$field] . '%']);
        }
    }
}