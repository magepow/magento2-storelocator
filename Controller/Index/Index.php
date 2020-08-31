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
namespace Magepow\StoreLocator\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $_storelocatorFactory;
    protected $resultForwardFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magepow\StoreLocator\Model\StoreLocatorFactory $storelocatorFactory,
       \Magento\Framework\Controller\Result\ForwardFactory $resultForwardFactory
    )
    {
       $this->resultForwardFactory = $resultForwardFactory;
        $this->_storelocatorFactory = $storelocatorFactory;
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {

        $this->_view->loadLayout();

        $this->_view->renderLayout();

    }
}

