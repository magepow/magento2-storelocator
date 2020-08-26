<?php

namespace Magepow\StoreLocator\Model\ResourceModel\WorkingTime;

use Magepow\StoreLocator\Model\ResourceModel\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'time_id';
    protected $_previewFlag;
    protected function _construct()
    {
        $this->_init(

            'Magepow\StoreLocator\Model\WorkingTime',
            'Magepow\StoreLocator\Model\ResourceModel\WorkingTime'
        );
        $this->_map['fields']['time_id'] = 'main_table.time_id';
    }
}
