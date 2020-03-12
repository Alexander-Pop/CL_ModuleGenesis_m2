<?php

/**
 * Create Resource Model name for model  Student \Codelegacy\Genesis\Model\Student
 * As Model name Student then Resource model is Student
 */

namespace Codelegacy\Genesis\Model\ResourceModel;


class Student extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    
    /**
     * Define table for this Resource model
     * @return void
     */
    public function _construct()
    {
       $this->_init('genesis', 'id');
    }

}
