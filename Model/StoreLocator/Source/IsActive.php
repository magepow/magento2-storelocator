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
namespace Magepow\StoreLocator\Model\StoreLocator\Source;

class IsActive extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    protected $_options;
    public function getAllOptions()
    {
        if ($this->_options ===null) {
            $this->_options = [
                ['value' => '1', 'label' => __('Yes')],
                ['value' => '0', 'label' => __('No')]
            ];
        }
        return $this->_options;
    }
    final public function toOptionArray()
    {
        return array(
                array('value' => '1', 'label' => __('Yes')),
                array('value' => '0', 'label' => __('No'))
            );


    }
}
