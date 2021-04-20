<?php
namespace AHT\GssiCustomily\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use AHT\GssiCustomily\Helper\Data;

class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;

    protected $getPrice;
    
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        Data $getPrice
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->getPrice = $getPrice;
    }

    public function execute()
    {
        $a = $this->getPrice->getPriceSkuPersonalizationCodeQty(['sad','code','2']);
        echo "<pre>";
        var_dump($a);
        die();
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('AHT_GssiCustomily:gssicustomily');
        $resultPage->addBreadcrumb(__('GssiCustomily'), __('GssiCustomily'));
        $resultPage->addBreadcrumb(__('Manage GssiCustomily'), __('Manage GssiCustomily'));
        $resultPage->getConfig()->getTitle()->prepend(__('GssiCustomily'));
        return $resultPage;
    }


}