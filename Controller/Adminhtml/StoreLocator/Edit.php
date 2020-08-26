<?php

namespace Magepow\StoreLocator\Controller\Adminhtml\StoreLocator;

use Magento\Backend\App\Action;

class Edit extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Magepow_StoreLocator::save';

    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;
    protected $model;

    /**
     * @param Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Magento\Framework\Registry $registry
     */
    public function __construct(
        Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magepow\StoreLocator\Model\StoreLocator $model,
        \Magento\Framework\Registry $registry
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $registry;
        $this->model = $model;
        parent::__construct($context);
    }

    /**
     * Init actions
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    protected function _initAction()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Magepow_StoreLocator::googlestorelocator_storelocator')
            ->addBreadcrumb(__('STORES'), __('STORES'))
            ->addBreadcrumb(__('Manage Stores'), __('Manage Stores'));
        return $resultPage;
    }

    public function execute()
    {

        $id = $this->getRequest()->getParam('gmaps_id');

        if ($id) {
            $this->model->load($id);
            if (!$this->model->getId()) {
                $this->messageManager
                    ->addError(__('This store no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }

        $this->_coreRegistry->register('googlestorelocator_storelocator', $this->model);

        $resultPage = $this->_initAction();

        $resultPage->addBreadcrumb(
            $id ? __('Edit Stores') : __('New Store'),
            $id ? __('Edit Stores') : __('New Store')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Stores'));
        $resultPage->getConfig()->getTitle()
            ->prepend($this->model->getId() ? $this->model->getTitle() : __('New Stores'));

        return $resultPage;
    }
}
