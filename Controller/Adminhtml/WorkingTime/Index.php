<?php

namespace Magepow\StoreLocator\Controller\Adminhtml\WorkingTime;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }
    /**
     * Check the permission to run it
     *
     * @return bool
     */
    protected function _isAllowed()
    {

        return $this->_authorization
            ->isAllowed('Magepow_StoreLocator::working_time');
    }
    /**
     * Index action
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Magepow_StoreLocator::working_time');
        $resultPage->addBreadcrumb(__('Working Time'), __('Working Time'));
        $resultPage->getConfig()->getTitle()->prepend(__('Working Time'));
        return $resultPage;
    }
}



