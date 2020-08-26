<?php

namespace Magepow\StoreLocator\Model\ResourceModel;

class WorkingTime extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    protected function _construct()
    {
        $this->_init('working_time', 'time_id');
    }
}
