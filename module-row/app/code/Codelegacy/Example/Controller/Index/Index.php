<?php
/* Glory to Ukraine! Glory to the heros! */
namespace Codelegacy\Genesis\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface as HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\Action;

class Index extends Action implements HttpGetActionInterface
{
    
    public function __construct(
        Context $context
    ) {
        parent::__construct($context);
    }

    public function execute() 
    {
       return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }

}
