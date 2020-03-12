<?php
/* Glory to Ukraine! Glory to the heros! */
namespace Codelegacy\Genesis\Block\Adminhtml\Edit\Form;

class GenericButton 
{
    /**
     * @var \Magento\Backend\Block\Widget\Context
     */
    private $context;

    /**
     * @var \Codelegacy\Genesis\Model\StudentFactory
     */
    private $studentFactory;

    public function __construct(
        \Codelegacy\Genesis\Model\StudentFactory $studentFactory,
        \Magento\Backend\Block\Widget\Context  $context
   ) {
       
       $this->studentFactory = $studentFactory;
       $this->context = $context;
    }
    public function getId()
    {
        
        /**
         * Get Url param  value
         */
        if($this->context->getRequest()->getParam('genesis_id')){
            $studentModel =$this->studentFactory->create();
            $studentModel->load($this->context->getRequest()->getParam('genesis_id'));
            
            return $studentModel->getId();
        }
        return false;
    }
    public function getUrlBuilder()
    {
        return $this->context->getUrlBuilder();
    }
}
