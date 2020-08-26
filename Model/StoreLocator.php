<?php
namespace Magepow\StoreLocator\Model;
class StoreLocator extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'google_store';

    protected $_cacheTag = 'google_store';

    protected $_eventPrefix = 'google_store';

    protected function _construct()
    {
        $this->_init('Magepow\StoreLocator\Model\ResourceModel\StoreLocator');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}

