<?php
namespace Magepow\StoreLocator\Model\ResourceModel\StoreLocator;

use Magepow\StoreLocator\Model\ResourceModel\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'gmaps_id';
    protected $_previewFlag;
    protected function _construct()
    {
        $this->_init(

            'Magepow\StoreLocator\Model\StoreLocator',
            'Magepow\StoreLocator\Model\ResourceModel\StoreLocator'
        );
        $this->_map['fields']['gmaps_id'] = 'main_table.gmaps_id';
    }
}
