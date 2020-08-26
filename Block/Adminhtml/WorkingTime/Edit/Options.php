<?php

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
