<?php
namespace AHT\GssiCustomily\Model\ResourceModel;

class GssiCustomily extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb {
    protected function _construct() 
    {
        $this->_init('aht_gssicustomily', 'id');
    }
}