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

    public function __construct(
        ResourcePost $resource,
        GssiCustomilyFactory $postFactory,
        Data\GssiCustomilyInterfaceFactory $dataPostFactory,
        PostCollectionFactory $postCollectionFactory
    ) {
        $this->resource = $resource;
        $this->postFactory = $postFactory;
        $this->postCollectionFactory = $postCollectionFactory;
        // $this->searchResultsFactory = $searchResultsFactory;
        // $this->collectionProcessor = $collectionProcessor ?: $this->getCollectionProcessor();
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
        /*echo "<pre>";
        var_dump($Post->getData());
        die();*/
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
        /*$a = get_class_methods($collection);
        echo "<pre>";
        print_r($a->getFirstItem()->getData());
        die();*/
        /*foreach ($collection as $key => $value) {
            $value->getData();
            echo "<pre>";
            print_r($value->getPrice());

        }
        die();*/
        /*var_dump($collection->getData());
        die('abc');*/
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
        /*$postPrice = $price;
        $Post = $this->PostFactory->create();
        $Post->load($postPrice);
        if (!$Post->getId()) {
            throw new NoSuchEntityException(__('The CMS Post with the "%1" ID doesn\'t exist.', $postPrice));
        }
        $result = $Post;
        return $result;*/

        /*$postPrice = $price;*/
        
        $collection = $this->PostCollectionFactory->create();
        /*$a = $collection->getPrice();*/
        foreach ($collection as $key => $value) {
            /*$a = */$value->getPrice();
           /* echo "<pre>";
            print_r($a);*/
           /* return $value->getPrice();*/
        }
        /*die();*/
       /* echo "<pre>";
        print_r($a);
        echo "</pre>";
        die();*/

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
        /*1$postSku = $sku;*/
        /*$Post = $this->PostFactory->create();
        $Post->load($postSku);*/

        /*2$collection = $this->PostCollectionFactory->create();
        foreach ($collection as $key => $value) {
            $value->getPrice($postSku);
            echo "<pre>";
            print_r($value->getPrice($postSku));
        }
        die();
        $a = $value->getPrice($postSku);*/
        /*if (!$collection->getPrice()) {
            throw new NoSuchEntityException(__('The CMS Post with the "%1" ID doesn\'t exist.', $postSku));
        }*/
        /* $result = $a;*/
        /*3return $a;*/

        /*$postId = $sku;
        $Post = $this->PostFactory->create();
        $Post->load($postId);
        echo "<pre>";
        var_dump($Post->getData());
        die();
        if (!$Post->getId()) {
            throw new NoSuchEntityException(__('The CMS Post with the "%1" ID doesn\'t exist.', $postId));
        }
        $result = $Post;
        return $result;*/
        
        $product = $this->postFactory->create();
        $productPriceById = $product->load($id)->getPrice();
        return $productPriceById;
    }

     /**
     * Get Price by Sku
     *
     * @param [type] $sku
     * @return \AHT\GssiCustomily\Api\Data\GssiCustomilyInterface
     */
    public function getPriceSku($sku)
    {
        die('arsdfghjkl');
        $product = $this->postFactory->create();
        $productPriceById = $product->loadByAttribute('sku', $sku)->getPrice();
        return $productPriceById;
    }
}