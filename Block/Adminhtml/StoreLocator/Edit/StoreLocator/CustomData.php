<?php
namespace Magepow\StoreLocator\Block\Adminhtml\StoreLocator\Edit\StoreLocator;

class CustomData extends \Magento\Backend\Block\Template
{
    /**
     * Block template.
     *
     * @var string
     */
    protected $_template = 'storelocator.phtml';

    /**
     * AssignProducts constructor.
     *
     * @param \Magento\Backend\Block\Template\Context  $context
     * @param array                                    $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }
}
