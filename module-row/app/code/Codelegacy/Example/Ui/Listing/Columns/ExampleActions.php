<?php
/* Glory to Ukraine! Glory to the heros! */
namespace Codelegacy\Genesis\Ui\Listing\Columns;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\UrlInterface;

class GenesisActions extends \Magento\Ui\Component\Listing\Columns\Column
{

    /**
     * Add edit page Url path
     * Format AdminRouteId/ControllerFolderInSmall/ActionfileInSmall
     */
    const EDIT_PAGE_URL_PATH ="genesisadminid/genesis/edit";
    
    /**
     * Add Delete page Url path
     * Format AdminRouteId/ControllerFolderInSmall/ActionfileInSmallCase
     */
    const DELETE_PAGE_URL_PATH ="genesisadminid/genesis/delete";    
    /**
     * @var \Magento\Framework\UrlInterface
     */
    private $urlBuilder;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,   
        array $components = array(),
        array $data = array()) 
    {
       parent::__construct($context, $uiComponentFactory, $components, $data);
       $this->urlBuilder = $urlBuilder;
    }
    /**
     * Add Url Actions to Json data of Ui grid listing Data Source
     */
    public function prepareDataSource(array $dataSource)
    {
        if(isset($dataSource['data']['items'])){
            foreach ($dataSource['data']['items'] as & $item){
                if($item['id']){
                    $item[$this->getData('name')] =[
                        'edit' =>[
                            'label' => __('Edit Action'),
                            'href' => $this->urlBuilder->getUrl(
                                    self::EDIT_PAGE_URL_PATH,
                                       ['genesis_id' => $item['id']] // this Parameter will show at url
                                    )
                        ],
                        'delete' => [
                            'label' => __('Delete Action'),
                            'href' => $this->urlBuilder->getUrl(
                                    self::DELETE_PAGE_URL_PATH,
                                       ['genesis_id' => $item['id']]
                                    ),
                            'post' => true ,  // Hitting Delete Url as POST request
                            // Adding Confirm Pop during Delete
                            'confirm' =>[
                               'title' => __('Delete record of %1',$item['name']),
                                'message' => __('Are you sure you want to delete a record of %1 ?', $item['name']),
                            ]
                        ]
                    ];                    
                }

            }
            
        }        
        return $dataSource;
    }
}
