<?php
namespace AHT\GssiCustomily\Model;

use AHT\GssiCustomily\Api\Data;
use AHT\GssiCustomily\Api\GssiCustomilyRepositoryInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use AHT\GssiCustomily\Model\ResourceModel\GssiCustomily as ResourcePost;
use AHT\GssiCustomily\Model\ResourceModel\GssiCustomily\CollectionFactory as PostCollectionFactory;
use AHT\GssiCustomily\Api\Data\GssiCustomilyInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use AHT\GssiCustomily\Model\GssiCustomilyFactory;

/**
 * Class PostRepository
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class GssiCustomilyRepository implements GssiCustomilyRepositoryInterface
{
    /**
     * @var ResourcePost
     */
    protected $resource;

    /**
     * @var postFactory
     */
    protected $postFactory;

    /**
     * @var postCollectionFactory
     */
    protected $postCollectionFactory;

    /**
     * @var Data\PostSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;
    /**
     * @param ResourcePost $resource
     * @param PostFactory $postFactory
     * @param Data\PortfolioInterfaceFactory $dataPostFactory
     * @param PostCollectionFactory $postCollectionFactory
     * @param Data\PostSearchResultsInterfaceFactory $searchResultsFactory
     */
    private $collectionProcessor;

    private $_sku;

    private $_collection;

    public function __construct(
        ResourcePost $resource,
        GssiCustomilyFactory $postFactory,
        Data\GssiCustomilyInterfaceFactory $dataPostFactory,
        PostCollectionFactory $postCollectionFactory
    ) {
        $this->resource = $resource;
        $this->postFactory = $postFactory;
        $this->postCollectionFactory = $postCollectionFactory;
    }

    /**
     * Load Post data by given Post Identity
     *
     * @param [type] $id
     * @return \AHT\GssiCustomily\Model\ResourceModel\GssiCustomily
     */
    public function getById($id)
    {
        $postId = intval($id);
        $Post = $this->postFactory->create();
        $Post->load($postId);
        if (!$Post->getId()) {
            throw new NoSuchEntityException(__('The CMS Post with the "%1" ID doesn\'t exist.', $postId));
        }
        $result = $Post;
        return $result;
    }

    /**
     * function get all data
     *
     * @return \AHT\GssiCustomily\Api\Data\GssiCustomilyInterface
     */
    public function getList()
    {
        $collection = $this->postCollectionFactory->create();
        return $collection->getData();
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return \AHT\GssiCustomily\Api\Data\GssiCustomerSearchResultsInterface
     */
    public function getPriceBySearchCriteria(SearchCriteriaInterface $searchCriteria)
    {
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);

        $collection = $this->_storeFactory->create()->getCollection();
        $this->collectionProcessor->process($searchCriteria, $collection);
        $searchResults->setTotalCount($collection->getSize());

        $currentPage = $searchCriteria->getCurrentPage() ?: 1;
        $pageSize = $searchCriteria->getPageSize() ?: 10;
        $collection->setCurPage($currentPage);
        $collection->setPageSize($pageSize);
        $searchResults->setItems($collection->getData());

        return $searchResults;
    }

    /**
     * Load Post data by given Post Identity
     *
     * @param [type] $price
     * @return \AHT\GssiCustomily\Model\ResourceModel\GssiCustomily
     */
    public function getPriceAll()
    {     
        $collection = $this->PostCollectionFactory->create();
        /*$a = $collection->getPrice();*/
        foreach ($collection as $key => $value) {
            $value->getPrice();
        }
        return $value->getPrice();
    }

    /**
     * Get Price by Id
     *
     * @param [type] $id
     * @return \AHT\GssiCustomily\Api\Data\GssiCustomilyInterface
     */
    public function getPriceId($id)
    {        
        $product = $this->postFactory->create();
        $productPriceById = $product->load($id)->getPrice();
        return $productPriceById;
    }

    public function getPriceSku(array $sku)
    {
        $this->_price = $sku;
        $collection = $this->postCollectionFactory->create();

        $this->_collection = $collection;

        $this->toFilterLike('sku');

        foreach ($collection as $key => $value) {
            $price = $value->getPrice();
        }
        return $price;
    }

    public function getPricePersonalizationCode(array $code)
    {
        $this->_price = $code;
        $collection = $this->postCollectionFactory->create();

        $this->_collection = $collection;

        $this->toFilterLike('personalizationcode');

        foreach ($collection as $key => $value) {
            $price = $value->getPrice();
        }
        return $price;
    }

    public function getPriceSkuPersonalizationCodeQty(array $array)
    {
        $this->_price = $array;
        $collection = $this->postCollectionFactory->create();

        $this->_collection = $collection;

        $this->toFilterLike('sku');
        $this->toFilterLike('personalizationcode');
        $this->toFilterLike('qty');

        foreach ($collection as $key => $value) {
            $price = $value->getPrice();
        }
        echo "<pre>";
        var_dump( $price = $value->getPrice());
        die;
        return $price;
    }

    public function toFilterLike(String $field)
    {
        if (isset($this->_price[$field])) {
            $this->_collection->addFieldToFilter($field, ['like' => '%' . $this->_price[$field] . '%']);
        }
    }

}