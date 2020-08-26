<?php
namespace Magepow\StoreLocator\Block;

use Magento\Framework\ObjectManagerInterface;
use Magento\Framework\View\Element\Template;
use Magento\Customer\Model\Session;
use Magento\Framework\View\Element\Template\Context;

class StoreLocator extends Template
{
    protected $_customerSession;
    protected $scopeConfig;
    protected $collectionFactory;
    protected $objectManager;
    public $googleMapsStoreHelper;
    protected $_storelocatorFactory;
    protected $workingTimeFactory;




    public function __construct(Context $context,
                                \Magepow\StoreLocator\Helper\Data $helper,
                                \Magepow\StoreLocator\Model\ResourceModel\StoreLocator\CollectionFactory $collectionFactory,
                                ObjectManagerInterface $objectManager,
                                \Magepow\StoreLocator\Model\StoreLocatorFactory $storelocatorFactory,
                                \Magepow\StoreLocator\Model\WorkingTimeFactory $workingTimeFactory,

                                array $data = []

     )
    {
        $this->_storelocatorFactory =$storelocatorFactory;
        $this->collectionFactory = $collectionFactory;
        $this->objectManager = $objectManager;
        $this->googleMapsStoreHelper = $helper;
        $this->workingTimeFactory = $workingTimeFactory;
        parent::__construct($context, $data);
    }

    public function _prepareLayout()
    {

        if ($this->googleMapsStoreHelper->isEnabledInFrontend()) {
            $this->pageConfig->setKeywords($this->googleMapsStoreHelper->getGMapMetaKeywords());
            $this->pageConfig->setDescription($this->googleMapsStoreHelper->getGMapMetadescription());
            $this->pageConfig->getTitle()->set($this->googleMapsStoreHelper->getGMapPageTitle());

            return parent::_prepareLayout();
        }
    }
    public function getAllStores()
    {
        $collection = $this->collectionFactory->create()
            ->setOrder('creation_time', 'DESC')
        ->addFieldToFilter('is_active', 1);
        $this->setData('google_store', $collection);
        $this->setData('mediaURL', $this->_storeManager->getStore()
                ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . 'storelocator/images/');
        return $collection;
    }
    public function getAllTime(){
        $workingtime = $this->workingTimeFactory->create()->getCollection();
        return $workingtime;
    }

    
}
