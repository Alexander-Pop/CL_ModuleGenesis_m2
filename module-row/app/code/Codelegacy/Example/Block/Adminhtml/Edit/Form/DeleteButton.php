<?php
/* Glory to Ukraine! Glory to the heros! */
namespace Codelegacy\Genesis\Block\Adminhtml\Edit\Form;

use Codelegacy\Genesis\Ui\Listing\Columns\GenesisActions;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class DeleteButton extends GenericButton implements ButtonProviderInterface
{
    //put your code here
    public function getButtonData(): array 
    {
        $data = [];
        /**
         * If Record exits on database then show delete button 
         */
        if($this->getId()){
            $params = ['genesis_id' => $this->getId()];
               $data = [
                'label' => __('Delete Record'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\'' . __(
                    'Are you sure you want to do this?'
                ) . '\', \'' . $this->getUrlBuilder()->getUrl(GenesisActions::DELETE_PAGE_URL_PATH, $params) . '\', {data: {}})',
                'sort_order' => 20,
            ];         
        }
        return $data;
    }

}
