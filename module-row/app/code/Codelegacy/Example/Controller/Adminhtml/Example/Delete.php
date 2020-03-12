<?php
/* Glory to Ukraine! Glory to the heros! */
namespace Codelegacy\Genesis\Controller\Adminhtml\Genesis;

class Delete  extends  \Magento\Backend\App\Action
{

    /**
     * Add ACL Resource TO this URL
     */
    
     const ADMIN_RESOURCE ="Codelegacy_Genesis::genesis_delete";
      
    /**
     * @var \Codelegacy\Genesis\Model\StudentFactor
     */
    private $studentFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Codelegacy\Genesis\Model\StudentFactory $studentFactory   
    ) {
        $this->studentFactory = $studentFactory; 
       parent::__construct($context);

    }
    
    public function execute() 
    {
        
      $resultRedirect = $this->resultRedirectFactory->create();   
     /**
      * Get Record id from Url parameters
      */  
        $id = $this->getRequest()->getParam('genesis_id');
        
        if($id){
            $studentModel = $this->studentFactory->create();
            $studentModel->load($id);
            /**
             * If getId() has value then means record exits
             */
            if($studentModel->getId()){
                
                try{
                    $studentModel->delete();
                    $this->messageManager->addSuccessMessage(__('The record has been deleted successfully'));                    
                } catch (\Exception $ex) {
                    $this->messageManager->addErrorMessage(__('Something went wrong while Delete'));
                }

                // after delete Record ,return to Listing page
                return $resultRedirect->setPath('*/*/listing');
            }

        }
        $this->messageManager->addErrorMessage(__('The Record does not exist'));
        //  Return to Listing page
        return $resultRedirect->setPath('*/*/listing');       
    }

}
