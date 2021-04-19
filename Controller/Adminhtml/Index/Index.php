<?php
namespace AHT\GssiCustomily\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;
    
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('AHT_GssiCustomily:gssicustomily');
        $resultPage->addBreadcrumb(__('GssiCustomily'), __('GssiCustomily'));
        $resultPage->addBreadcrumb(__('Manage GssiCustomily'), __('Manage GssiCustomily'));
        $resultPage->getConfig()->getTitle()->prepend(__('GssiCustomily'));
        return $resultPage;
    }
}