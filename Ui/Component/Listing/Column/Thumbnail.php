<?php

namespace Magepow\StoreLocator\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;

class Thumbnail extends \Magento\Ui\Component\Listing\Columns\Column
{

    protected $_storeManager;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    )
    {
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->_storeManager = $storeManager;
        $this->urlBuilder = $urlBuilder;
    }

    /**
     * Prepare Data Source
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            // Get column name
            $fieldName = $this->getData('name');

            foreach ($dataSource['data']['items'] as & $item) {
                // Get image URL
                $url = '';
                if ($item[$fieldName] != '') {
                    $url = $this->_storeManager->getStore()->getBaseUrl(
                            \Magento\Framework\UrlInterface::URL_TYPE_MEDIA
                        ) . 'storelocator/images/' . $item[$fieldName];
                }

                // Add image with link and alternative text
                $item[$fieldName . '_src'] = $url;
                $item[$fieldName . '_alt'] = $item[$fieldName];
                $item[$fieldName . '_link'] = $this->urlBuilder->getUrl(
                    'storelocator/index/edit',
                    ['gmaps_id' => $item['gmaps_id']]
                );
                $item[$fieldName . '_orig_src'] = $url;
            }
        }

        return $dataSource;
    }
}
