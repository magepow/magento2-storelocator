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
namespace Magepow\StoreLocator\Model\StoreLocator\Source\Config;

class Config implements \Magento\Framework\Option\ArrayInterface
{
    protected $modes = [
        'VN' => 'Viet Nam',
    ];
    public function toOptionArray()
    {
        $options = [];

        foreach ($this->modes as $mode => $label) {
            $options[] = [
                'value' => $mode,
                'label' => __($label)
            ];
        }

        return $options;
    }
}

