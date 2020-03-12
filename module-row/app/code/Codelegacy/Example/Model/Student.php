<?php

/**
 * Create model  name of Student
 */
namespace Codelegacy\Genesis\Model;


class Student extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Map Resource Class At Model lass
     */
    public function _construct()
    {
        $this->_init(\Codelegacy\Genesis\Model\ResourceModel\Student::class);
    }
}
