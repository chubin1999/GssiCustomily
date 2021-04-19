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
     * @var PostFactory
     */
    protected $PostFactory;

    /**
     * @var PostCollectionFactory
     */
    protected $PostCollectionFactory;

    /**
     * @var Data\PostSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;
    /**
     * @param ResourcePost $resource
     * @param PostFactory $PostFactory
     * @param Data\PortfolioInterfaceFactory $dataPostFactory
     * @param PostCollectionFactory $PostCollectionFactory
     * @param Data\PostSearchResultsInterfaceFactory $searchResultsFactory
     */
    private $collectionProcessor;

    public function __construct(
        ResourcePost $resource,
        GssiCustomilyFactory $PostFactory,
        Data\GssiCustomilyInterfaceFactory $dataPostFactory,
        PostCollectionFactory $PostCollectionFactory
    ) {
        $this->resource = $resource;
        $this->PostFactory = $PostFactory;
        $this->PostCollectionFactory = $PostCollectionFactory;
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
        $Post = $this->PostFactory->create();
        $Post->load($postId);
        if (!$Post->getId()) {
            throw new NoSuchEntityException(__('The CMS Post with the "%1" ID doesn\'t exist.', $PostId));
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
        $collection = $this->PostCollectionFactory->create();
        /*var_dump($collection->getData());
        die('abc');*/
        return $collection->getData();
    }

    /**
     * Load Post data by given Post Identity
     *
     * @param [type] $id
     * @return \AHT\GssiCustomily\Model\ResourceModel\GssiCustomily
     */
    public function getPriceBySku($sku){

    }
}