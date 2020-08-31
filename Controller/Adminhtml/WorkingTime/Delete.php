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
namespace Magepow\StoreLocator\Controller\Adminhtml\WorkingTime;

use Magento\Backend\App\Action;

class Delete extends \Magento\Backend\App\Action
{

    const ADMIN_RESOURCE = 'Magepow_StoreLocator::workingtime_delete';

    protected $model;
    public function __construct(
        Action\Context $context,
        \Magepow\StoreLocator\Model\StoreLocator $model
    ) {
        $this->model = $model;
        parent::__construct($context);
    }
    public function execute()
    {
        $id = $this->getRequest()->getParam('time_id');
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            $title = "";
            try {
                $this->model->load($id);
                $title = $this->model->getTitle();
                $this->model->delete();
                $this->messageManager->addSuccess(__('The store has been deleted.'));
                $this->_eventManager->dispatch(
                    'adminhtml_workingtimepage_on_delete',
                    ['title' => $title, 'status' => 'success']
                );
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->_eventManager->dispatch(
                    'adminhtml_workingtimepage_on_delete',
                    ['title' => $title, 'status' => 'fail']
                );

                $this->messageManager->addError($e->getMessage());

                return $resultRedirect->setPath('*/*/edit', ['time_id' => $id]);
            }
        }

        $this->messageManager->addError(__('We can\'t find a store to delete.'));
        return $resultRedirect->setPath('*/*/');
    }
}
