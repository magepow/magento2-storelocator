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
namespace Magepow\StoreLocator\Block\Adminhtml\WorkingTime\Edit;

class Options implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Scroll modes
     *
     * @var array
     */
    protected $modes = [
        'auto' => 'Automatic-on page scroll',
        'manual' => 'Automatic up to X pages, then manual',
        'auto_up_to' => 'Combined - Automatic + button',
        'auto_each' => 'Automatic each numbers pages'
    ];

    /**
     * Options getter
     *
     * @return array
     */
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
