<?php


namespace Magepow\StoreLocator\Controller\Adminhtml\StoreLocator\Image;

use Magento\Framework\Controller\ResultFactory;

class Upload extends \Magento\Backend\App\Action
{

    protected $imageUploader;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Catalog\Model\ImageUploader $imageUploader
    ) {
        parent::__construct($context);
        $this->imageUploader = $imageUploader;
    }

    /**
     * Check admin permissions for this controller
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magepow_StoreLocator::save');
    }

    public function execute()
    {
        // Save image to temp folder
        try {
            $result = $this->imageUploader->saveFileToTmpDir('images');
            $result['cookie'] = [
                'name' => $this->_getSession()->getName(),
                'value' => $this->_getSession()->getSessionId(),
                'lifetime' => $this->_getSession()->getCookieLifetime(),
                'path' => $this->_getSession()->getCookiePath(),
                'domain' => $this->_getSession()->getCookieDomain(),
            ];
        } catch (\Exception $e) {
            $result = ['error' => $e->getMessage(), 'errorcode' => $e->getCode()];
        }

        return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData($result);
    }
}
