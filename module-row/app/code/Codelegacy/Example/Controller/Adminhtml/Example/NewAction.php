<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\Genesis\Controller\Adminhtml\Genesis;

class NewAction extends \Magento\Backend\App\Action
{

    /**
     * @var \Magento\Backend\Model\View\Result\ForwardFactory
     */
    private $resultForwardFactory;

    /**
     * Using Same ACL 
     */
    const ADMIN_RESOURCE ="Codelegacy_Genesis::genesis_edit";
    
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory    
    ) {
        $this->resultForwardFactory = $resultForwardFactory;
        parent::__construct($context);

    }
    public function execute() 
    {
        $resultForward = $this->resultForwardFactory->create();
        /**
         * Forward to edit page;
         */
        return $resultForward->forward('edit');
    }

}
