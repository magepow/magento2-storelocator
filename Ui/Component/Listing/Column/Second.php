<?php
//
//namespace Magepow\StoreLocator\Ui\Component\Listing\Column;
//
//use Magento\Framework\Escaper;
//use Magepow\StoreLocator\Model\WorkingTimeFactory as WorkingTimesFactory;
//
//class Second implements \Magento\Framework\Option\ArrayInterface
//{
//    /**
//     * @var WorkingTimesFactory
//     */
//    protected $workingTimeFactory;
//
//    /**
//     * Escaper
//     *
//     * @var Escaper
//     */
//    protected $escaper;
//
//    /**
//     * Constructor
//     *
//     * @param WorkingTimesFactory $systemStore
//     * @param Escaper $escaper
//     */
//    public function __construct(WorkingTimesFactory $workingTimeFactory, Escaper $escaper)
//    {
//        $this->workingTimeFactory = $workingTimeFactory;
//        $this->escaper = $escaper;
//    }
//
//    /**
//     * Options getter
//     *
//     * @return array
//     */
//    public function toOptionArray()
//    {
//        return $this->getAvailableGroups();
//    }
//
//    /**
//     * Prepare groups
//     *
//     * @return array
//     */
//    private function getAvailableGroups()
//    {
//        for ($i =1; $i<= 60; $i++){
//            $result = [];
//            $result[] = ['value' => ' ', 'label' => 'Working Time'];
//            $result[] = ['value' => $i, 'label' => $this->escaper->escapeHtml($i->getName())];
//            return $result;
//        }
//
////       $collection = $this->workingTimeFactory->create()->getCollection();
////        $result = [];
////        $result[] = ['value' => ' ', 'label' => 'Working Time'];
////        foreach ($collection as $time) {
////            $result[] = ['value' => $time->getId(), 'label' => $this->escaper->escapeHtml($time->getName())];
////        }
////        return $result;
//    }
//}
