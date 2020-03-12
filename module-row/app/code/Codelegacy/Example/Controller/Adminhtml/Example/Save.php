<?php
/* Glory to Ukraine! Glory to the heros! */
namespace Codelegacy\Genesis\Controller\Adminhtml\Genesis;

use Magento\Framework\App\Request\DataPersistorInterface;

class Save extends \Magento\Backend\App\Action 
{

    const ADMIN_RESOURCE ="Codelegacy_Genesis::genesis_edit";

    /**
     * @var Magento\Framework\App\Request\DataPersistorInterface
     */
    private $dataPersistor;

    /**
     * @var \Codelegacy\Genesis\Model\StudentFactory
     */
    private $studentFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Codelegacy\Genesis\Model\StudentFactory $studentFactory,
        DataPersistorInterface $dataPersistor   
    ) {
        $this->studentFactory = $studentFactory;
        parent::__construct($context);
        $this->dataPersistor = $dataPersistor;
    }
    
    public function execute() 
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        
        if($data){
            $studentModel = $this->studentFactory->create();
            $id = $this->getRequest()->getParam('id');

            /**
             *  set Id null when new record creating
             */

            if(empty($data['id'])){
                $data['id'] = null;
            }

            if($id){
               $studentModel->load($id); 
            }

            
            $studentModel->setData($data);
            // Save Data using Model Save
            try{
               $studentModel->save();
               $this->messageManager->addSuccessMessage(__('Record SucessFully Update'));
               /**
                * Clear Data From dataPersistor variable is successfully save
                */
               $this->dataPersistor->clear('genesis_data');
               
               return $resultRedirect->setPath('*/*/edit', ['genesis_id' => $studentModel->getId() ]);
               
            } catch (\Exception $exception) {
                
                $this->messageManager->addExceptionMessage($exception,__('Something Went to Wrong While save data'));
            }
            /**
             * Send Post Data from Save to Edit page while any error happen on save of data
             */
            $this->dataPersistor->set('genesis_data',$data);
            return $resultRedirect->setPath('*/*/edit', ['genesis_id' =>$id ]);
            
        }
        // if post does not find then redirect to Listing page
        return $resultRedirect->setPath('*/*/listing');
    }

}
