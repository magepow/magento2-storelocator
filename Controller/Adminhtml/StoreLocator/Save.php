<?php

namespace Magepow\StoreLocator\Controller\Adminhtml\StoreLocator;

use Magento\Backend\App\Action;
use Magepow\StoreLocator\Model\StoreLocator;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Magepow_StoreLocator::save';

    /**
     * @var PostDataProcessor
     */
    protected $dataProcessor;

    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;
    protected $model;

    /**
     * @param Action\Context $context
     * @param PostDataProcessor $dataProcessor
     * @param DataPersistorInterface $dataPersistor
     */
    public function __construct(
        Action\Context $context,
        PostDataProcessor $dataProcessor,
        Storelocator $model,
        DataPersistorInterface $dataPersistor
    ) {
        $this->dataProcessor = $dataProcessor;
        $this->dataPersistor = $dataPersistor;
        $this->model = $model;
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            $data = $this->dataProcessor->filter($data);
            if (isset($data['is_active']) && $data['is_active'] === 'true') {
                $data['is_active'] = Storelocator::STATUS_ENABLED;
            }
            if (empty($data['gmaps_id'])) {
                $data['gmaps_id'] = null;
            }
            if (empty($data['images'])) {
                $data['images'] = null;
            } else {
                if ($data['images'][0] && $data['images'][0]['name'])
                    $data['image'] = $data['images'][0]['name'];
                else
                    $data['image'] = null;
            }

            $id = $this->getRequest()->getParam('gmaps_id');
            if ($id) {
                $this->model->load($id);
            }

            $this->model->setData($data);

            $this->_eventManager->dispatch(
                'googlestorelocator_storelocator_prepare_save',
                ['StoreLocator' => $this->model, 'request' => $this->getRequest()]
            );

            if (!$this->dataProcessor->validate($data)) {
                return $resultRedirect->setPath('*/*/edit', ['gmaps_id' => $this->model->getId(), '_current' => true]);
            }

            try {
                $this->model->save();
                $this->messageManager->addSuccess(__('You saved the store.'));
                $this->dataPersistor->clear('googlestorelocator');
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath(
                        '*/*/edit',
                        ['gmaps_id' => $this->model->getId(),
                            '_current' => true]
                    );
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the store.'));
            }

            $this->dataPersistor->set('googlestorelocator', $data);
            return $resultRedirect->setPath('*/*/edit', ['gmaps_id' => $this->getRequest()->getParam('gmaps_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}
