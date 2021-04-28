<?php

namespace AHT\GssiCustomily\Controller\Adminhtml\Index;

class Delete extends \Magento\Backend\App\Action
{
    /**
     * Delete Banner
     *
     * @return \Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
        // check if we know what should be deleted
        $bannerId = (int)$this->getRequest()->getParam('id');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($bannerId && (int) $bannerId > 0) {
            try {
                $model = $this->_objectManager->create('AHT\GssiCustomily\Model\GssiCustomily');
                $model->load($bannerId);
                $model->delete();
                $this->messageManager->addSuccess(__('The Gssi Customily has been deleted successfully.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addError($e->getMessage());
                // go back to the question grid
                return $resultRedirect->setPath('*/*/gssicustomily');
            }
        }
        // display error message
        $this->messageManager->addError(__('GssiCustomily doesn\'t exist any longer.'));
        // go to the question grid
        return $resultRedirect->setPath('*/*/gssicustomily');
    }
}