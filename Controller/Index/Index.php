<?php
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

