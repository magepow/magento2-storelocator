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
namespace Magepow\StoreLocator\Model\ResourceModel;

class StoreLocator extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('magepow_googlestorelocator', 'gmaps_id');
    }


    protected function _afterSave(\Magento\Framework\Model\AbstractModel $object)
    {
        $oldImage = $object->getOrigData('image');
        $newImage = $object->getData('image');
        if ($newImage != null && $newImage != $oldImage) {
            $imageUploader = \Magento\Framework\App\ObjectManager::getInstance()
                ->get('Magepow\StoreLocator\StoreLocatorImageUpload');
            $imageUploader->moveFileFromTmp($newImage);
        }
        return $this;
    }
}
