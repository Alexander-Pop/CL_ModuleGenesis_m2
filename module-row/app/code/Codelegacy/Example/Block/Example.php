<?php
/* Glory to Ukraine! Glory to the heros! */
namespace Codelegacy\Genesis\Block;

use Magento\Framework\View\Element\Template\Context;
use Codelegacy\Genesis\Model\StudentFactory;
class Genesis extends \Magento\Framework\View\Element\Template
{

    /**
     * @var \Codelegacy\Genesis\Model\StudentFactory
     */
    private $studentFactory;

    /**
    * inject the model Class Factory for getting data
    */
  public function __construct(
          Context $context,
          StudentFactory $studentFactory,
          array $data = array()) 
    {
      parent::__construct(
        $context, 
        $data
      );
      $this->studentFactory = $studentFactory;
    }  
    
    public function getJohnInfo()
    {
        $studentModel = $this->studentFactory->create();
        
        /**
         * Using primary Id
         */
        $studentModel->load(1); //John Primary 
        
        return $studentModel;
    }

}
