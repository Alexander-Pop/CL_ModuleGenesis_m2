<?php

/*
  * Collection Model Class .As Model and Resource model Class Name is Student
 *  That create name student folder at Codelegacy\Genesis\Model\ResourceModel
 */

namespace Codelegacy\Genesis\Model\ResourceModel\Student;


class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    
   /**
    * Map Model CLass and Resource mode Class at COllection Class
    */
    public function _construct()
    {
        $this->_init(
                \Codelegacy\Genesis\Model\Student::class,
                 \Codelegacy\Genesis\Model\ResourceModel\Student::class
                );
    }
    
}
