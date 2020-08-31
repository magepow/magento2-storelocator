<?php
/**
 * Magepow
 * @category Magepow
 * @copyright Copyright (c) 2014 Magepow (<https://www.magepow.com>)
 * @license <https://www.magepow.com/license-agreement.html>
 * @Author: magepow<support@magepow.com>
 * @github: <https://github.com/magepow>
 * @@Create Date: 2017-08-29 22:55:21
 * @@Modify Date: 2018-03-15 00:21:25
 */
namespace Magepow\StoreLocator\Block;

use Magento\Framework\ObjectManagerInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class StoreLocator extends Template
{
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

    public function getAllStores()
    {
        $collection = $this->collectionFactory->create()
            ->setOrder('creation_time', 'DESC')
        ->addFieldToFilter('is_active', 1);
        $this->setData('magepow_googlestorelocator', $collection);
        $this->setData('mediaURL', $this->_storeManager->getStore()
                ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . 'storelocator/images/');
        return $collection;
    }
    public function getAllTime(){
        $workingtime = $this->workingTimeFactory->create()->getCollection();
        return $workingtime;
    }


}
