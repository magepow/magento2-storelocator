<?php

namespace Magepow\StoreLocator\Controller\Adminhtml\WorkingTime;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Cms\Api\Data\PageInterface;
use Magepow\StoreLocator\Model\WorkingTime as ModelWorkingTime;

class InlineEdit extends \Magento\Backend\App\Action
{
    protected $dataProcessor;
    protected $jsonFactory;
    protected $WorkingTimeModel;

    public function __construct(
        Context $context,
        PostDataProcessor $dataProcessor,
        ModelWorkingTime $WorkingTimeModel,
        JsonFactory $jsonFactory
    ) {
        parent::__construct($context);
        $this->dataProcessor = $dataProcessor;
        $this->jsonFactory = $jsonFactory;
        $this->WorkingTimeModel = $WorkingTimeModel;
    }

    public function execute()
    {
        $resultJson = $this->jsonFactory->create();
        $error = false;
        $messages = [];
        $postItems = $this->getRequest()->getParam('items', []);
        if (!($this->getRequest()->getParam('isAjax') && count($postItems))) {
            return $resultJson->setData([
                'messages' => [__('Please correct the data sent.')],
                'error' => true,
            ]);
        }

        foreach (array_keys($postItems) as $Id) {
            $Storelocator = $this->WorkingTimeModel->load($Id);

            try {
                $Data = $this->filterPost($postItems[$Id]);
                $this->validatePost($Data, $Storelocator, $error, $messages);
                $extendedPageData = $Storelocator->getData();
                $this->setGoogleMapsStoreLocatorStorelocatorData($Storelocator, $extendedPageData, $Data);
                $this->WorkingTimeModel->save($Storelocator);
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $messages[] = $this->getErrorWithPageId($Storelocator, $e->getMessage());
                $error = true;
            } catch (\RuntimeException $e) {
                $messages[] = $this->getErrorWithPageId($Storelocator, $e->getMessage());
                $error = true;
            } catch (\Exception $e) {
                $messages[] = $this->getErrorWithPageId(
                    $Storelocator,
                    __('Something went wrong while saving the item.')
                );
                $error = true;
            }
        }

        return $resultJson->setData([
            'messages' => $messages,
            'error' => $error
        ]);
    }

    protected function filterPost($postData = [])
    {
        $pageData = $this->dataProcessor->filter($postData);
        $pageData['custom_theme'] = isset($pageData['custom_theme']) ? $pageData['custom_theme'] : null;
        $pageData['custom_root_template'] = isset($pageData['custom_root_template'])
            ? $pageData['custom_root_template']
            : null;
        return $pageData;
    }

    protected function validatePost(
        array $pageData,
        \Magepow\StoreLocator\Model\Storelocator $page,
        &$error,
        array &$messages
    ) {
        if (!($this->dataProcessor->validate($pageData) && $this->dataProcessor->validateRequireEntry($pageData))) {
            $error = true;
            foreach ($this->messageManager->getMessages(true)->getItems() as $error) {
                $messages[] = $this->getErrorWithPageId($page, $error->getText());
            }
        }
    }

    protected function getErrorWithPageId(ModelWorkingTime $page, $errorText)
    {
        return '[Page ID: ' . $page->getId() . '] ' . $errorText;
    }

    public function setGoogleMapsStoreLocatorStorelocatorData(
        ModelWorkingTime $page,
        array $extendedPageData,
        array $pageData
    ) {
        $page->setData(array_merge($page->getData(), $extendedPageData, $pageData));
        return $this;
    }
}
