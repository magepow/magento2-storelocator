<?php

namespace Magepow\StoreLocator\Model\WorkingTime\Source;

use Magento\Framework\Escaper;
use Magepow\StoreLocator\Model\WorkingTimeFactory as WorkingTimesFactory;

class Options implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @var WorkingTimesFactory
     */
    protected $workingTimeFactory;

    /**
     * Escaper
     *
     * @var Escaper
     */
    protected $escaper;

    /**
     * Constructor
     *
     * @param WorkingTimesFactory $systemStore
     * @param Escaper $escaper
     */
    public function __construct(WorkingTimesFactory $workingTimeFactory, Escaper $escaper)
    {
        $this->workingTimeFactory = $workingTimeFactory;
        $this->escaper = $escaper;
    }

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return $this->getAvailableGroups();
    }

    /**
     * Prepare groups
     *
     * @return array
     */
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
