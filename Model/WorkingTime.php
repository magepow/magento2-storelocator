<?php
namespace Magepow\StoreLocator\Model;
class WorkingTime extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'working_time';

    protected $_cacheTag = 'working_time';

    protected $_eventPrefix = 'working_time';

    protected function _construct()
    {
        $this->_init('Magepow\StoreLocator\Model\ResourceModel\WorkingTime');
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

