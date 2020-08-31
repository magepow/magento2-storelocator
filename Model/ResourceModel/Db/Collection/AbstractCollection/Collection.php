<?php
namespace Magepow\StoreLocator\Model\ResourceModel\Db\Collection\AbstractCollection;


class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection{


    protected function _construct()
    {
        $this->_init('Magepow\StoreLocator\Model\StoreLocator', 'Magepow\StoreLocator\Model\ResourceModel\WorkingTime');
    }


    protected function StoreWorking($store_working)
    {
        $this->google_store_table = "google_store";
        $this->working_time_table = $this->getTable("working_time");
        $this->getSelect()
            ->join(array('google_store' =>$this->working_time_table), $this->google_store_table . '.time_id= google_store.time_id',
                array('google_store_method' => 'google_store.method',
                    'time_id' => $this->google_store_table.'.time_id'
                )
            );
        $this->getSelect()->where("google_store_method=".$store_working);
    }
}
