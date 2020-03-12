<?php
/* Glory to Ukraine! Glory to the heros! */
namespace Codelegacy\Genesis\Controller\Adminhtml\Genesis;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Listing extends  \Magento\Backend\App\Action
{
    /**
     * @url adminUrl/frontName/ControllerFolder/ActionfileName
     * @genesis adminUrl/genesisadmin/genesis/listing
     */

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    private $resultPageFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory   
     ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }
    public function execute() 
    {
        $resultPage=  $this->resultPageFactory->create();
        $resultPage->getConfig()->setKeywords(__('Genesis Test KeyWord'));
        /**
         * Left menu Select
         */
        $resultPage->setActiveMenu('Codelegacy_Genesis::menu');
        /**
         * Set Page title
         */
        $resultPage->getConfig()->getTitle()->set(_('Hello Config Title'));
        $resultPage->addBreadcrumb(__('Hello'), __('Hello'));
        $resultPage->addBreadcrumb(__('Genesis'), __('Genesis'));
        return $resultPage;        
    }

}
