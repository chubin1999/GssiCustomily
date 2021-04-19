<?php
namespace AHT\GssiCustomily\Model;

use \Magento\Framework\DataObject\IdentityInterface;
use AHT\GssiCustomily\Api\Data\GssiCustomilyInterface;

class GssiCustomily extends \Magento\Framework\Model\AbstractModel implements IdentityInterface, GssiCustomilyInterface {
    const CACHE_TAG = 'aht_gssicustomily_post';

    protected $_cacheTag = 'aht_gssicustomily_post';

    protected $_eventPrefix = 'aht_gssicustomily_post';

    public function __construct(
   	 \Magento\Framework\Model\Context $context,
   	 \Magento\Framework\Registry $registry,
   	 \Magento\Framework\Model\ResourceModel\AbstractResource $resource =
   	 null,
   	 \Magento\Framework\Data\Collection\AbstractDb $resourceCollection =
   	 null,
   	 array $data = []
    ) {
   	 parent::__construct($context, $registry, $resource,$resourceCollection, $data);
    }
    
    public function _construct() {
		$this->_init('AHT\GssiCustomily\Model\ResourceModel\GssiCustomily');
    }

     public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }

    public function getId()
    {
        return $this->getData('id');
    }

    public function setId($id)
    {
        $this->setData('id', $id);
    }
     
    public function getSku()
    {
        return $this->getData('sku');
    }

    public function setSku($sku)
    {
        $this->setData('sku', $sku);
    } 

    public function getPersonalizationCode()
    {
        return $this->getData('personalizationcode');
    }

    public function setPersonalizationCode($personalizationCode)
    {
        $this->setData('personalizationcode', $personalizationCode);
    } 

    public function getQty()
    {
        return $this->getData('qty');
    }

    public function setQty($qty)
    {
        $this->setData('qty', $qty);
    }

    public function getPrice()
    {
        return $this->getData('price');
    }

    public function setPrice($price)
    {
        $this->setData('price', $price);
    } 
}