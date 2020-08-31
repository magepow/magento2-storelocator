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
namespace Magepow\StoreLocator\Model\WorkingTime\Source;

use Magento\Framework\Escaper;
use Magepow\StoreLocator\Model\WorkingTimeFactory as WorkingTimesFactory;

class Options implements \Magento\Framework\Option\ArrayInterface
{
    protected $workingTimeFactory;
    protected $escaper;
    public function __construct(WorkingTimesFactory $workingTimeFactory, Escaper $escaper)
    {
        $this->workingTimeFactory = $workingTimeFactory;
        $this->escaper = $escaper;
    }
    public function toOptionArray()
    {
        return $this->getAvailableGroups();
    }
    private function getAvailableGroups()
    {
        $collection = $this->workingTimeFactory->create()->getCollection();
        $result = [];
        $result[] = ['value' => ' ', 'label' => 'Select...'];
        foreach ($collection as $time) {
            $result[] = ['value' => $time->getId(), 'label' => $this->escaper->escapeHtml($time->getName())];
        }
        return $result;
    }
}
