<?php
namespace Magepow\StoreLocator\Model\StoreLocator\Source;

class IsActive extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    protected $_options;

    /**
     * getAllOptions
     *
     * @return array
     */
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
