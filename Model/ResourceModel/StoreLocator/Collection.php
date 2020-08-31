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
