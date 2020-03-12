<?php
/**
 * Create edit page for Update data 
 * Glory to Ukraine! Glory to the heros! 
 */

namespace Codelegacy\Genesis\Controller\Adminhtml\Genesis;


class Edit extends  \Magento\Backend\App\Action
{

    /**
     * @var \Magento\Framework\Registry
     */
    private $registry;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    private $resultPageFactory;

    /**
     * @var \Codelegacy\Genesis\Model\StudentFactory
     */
    private $studentFactory;

    /**
     * 
     * Add Acl Resource id For Permission at admin section
     */
    const ADMIN_RESOURCE ="Codelegacy_Genesis::genesis_edit";
    
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Codelegacy\Genesis\Model\StudentFactory $studentFactory,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry  
    ) {
        $this->studentFactory    = $studentFactory;  
        $this->resultPageFactory = $resultPageFactory;
        $this->registry          = $registry;        
        parent::__construct($context);
    }

    public function execute() {
        
        /**
         * init Model using Model Factory
         */
        $studentModel= $this->studentFactory->create();
        /**
         * for  update a row data, we need  primary  field value
         * which URL param "genesis_id" = Database genesis table "id" field
         */ 
        $id = $this->getRequest()->getParam('genesis_id');
        if($id){
            /**
             * Load a record data from data using model
             */
            $studentModel->load($id);
            /**
             * Redirect to listing page if a record does not exit at database 
             * with request parameter
             */
            if(!$studentModel->getId()){
               $resultRedirect =  $this->resultRedirectFactory->create();
               return $resultRedirect->setPath('*/*/listing');
            }
            
        }
        /**
         * Save Model Data to a registry variable for future purpose
         * Variable name is user defined
         */
        $this->registry->register('genesis',$studentModel);
        
        $resultPage =$this->resultPageFactory->create();
        $resultPage->getConfig()->setKeywords(__('Edit Page'));
        /**
         * Left menu Select
         */
        $resultPage->setActiveMenu('Codelegacy_Genesis::menu');
        /**
         * Set Page title
         */
        
        $resultPage->getConfig()->getTitle()->prepend('Genesis Module');
        $pageTitltPrefix = __('Edit Page for %1',
                $studentModel->getId()?$studentModel->getName(): __('New entry')
                );
        $resultPage->getConfig()->getTitle()->prepend($pageTitltPrefix);
        return $resultPage;
        
    }

}
