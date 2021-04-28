<?php
namespace AHT\GssiCustomily\Model\ResourceModel\GssiCustomily;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
/*	protected $_idFieldName = 'id';
	protected $_eventPrefix = 'aht_gssicustomily_collection';
	protected $_eventObject = 'GssiCustomily_collection';*/

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('AHT\GssiCustomily\Model\GssiCustomily', 'AHT\GssiCustomily\Model\ResourceModel\GssiCustomily');
	}

}