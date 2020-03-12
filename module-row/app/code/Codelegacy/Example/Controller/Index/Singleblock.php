<?php
/* Glory to Ukraine! Glory to the heros! */
namespace Codelegacy\Genesis\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface as HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;

class Singleblock extends \Magento\Framework\App\Action\Action implements HttpGetActionInterface
{
    public function __construct(
            \Magento\Framework\App\Action\Context $context
     ) {
        parent::__construct($context);
    }
   
    public function execute() {
        $layout = $this->_view->getLayout();
        $layout->createBlock(
            \Codelegacy\Genesis\Block\Genesis::class,
            'mycustom.block'
        ) ;
        $response = $layout->getBlock('mycustom.block')->toHtml();
        $this->getResponse()->setBody($response);
        return;
    }

}
