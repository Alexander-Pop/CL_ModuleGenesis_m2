<?php
/* Glory to Ukraine! Glory to the heros! */
namespace Codelegacy\Genesis\Block\Adminhtml\Edit\Form;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveButton extends GenericButton implements ButtonProviderInterface
{
 
    public function getButtonData(): array 
    {
       $data = [];
       $data = [
                'label' => __('Save'),
                'class' => 'save primary',
                'on_click' => '',
            ];
        return $data;
    }

}
