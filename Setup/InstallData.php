<?php
namespace AHT\GssiCustomily\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    protected $_gssiCustomilyFactory;

    public function __construct(\AHT\GssiCustomily\Model\GssiCustomilyFactory $gssiCustomilyFactory)
    {
        $this->_gssiCustomilyFactory = $gssiCustomilyFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {

        $data = [
            'sku' => "It is test", 
            'personalizationcode' => "It is test",
            'qty'      => "It is test",
            'price' =>"It is test"
        ];
        $post = $this->_gssiCustomilyFactory->create();
        $post->addData($data)->save();
    }
}
?>