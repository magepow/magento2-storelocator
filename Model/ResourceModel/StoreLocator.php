<?php

namespace Magepow\StoreLocator\Model\ResourceModel;

class StoreLocator extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('google_store', 'gmaps_id');
    }


    protected function _afterSave(\Magento\Framework\Model\AbstractModel $object)
    {
        // Get image data before and after save
        $oldImage = $object->getOrigData('image');
        $newImage = $object->getData('image');

        // Check when new image uploaded
        if ($newImage != null && $newImage != $oldImage) {
            $imageUploader = \Magento\Framework\App\ObjectManager::getInstance()
                ->get('Magepow\StoreLocator\StoreLocatorImageUpload');
            $imageUploader->moveFileFromTmp($newImage);
        }

        return $this;
    }
}
