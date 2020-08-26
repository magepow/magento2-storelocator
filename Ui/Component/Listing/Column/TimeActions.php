<?php

namespace Magepow\StoreLocator\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magepow\StoreLocator\Block\Adminhtml\WorkingTime\Grid\Renderer\Action\UrlBuilder;
//use Magento\Cms\Block\Adminhtml\Page\Grid\Renderer\Action\UrlBuilder;
use Magento\Framework\UrlInterface;

/**
 * Class PageActions
 */
class TimeActions extends Column
{
    /** Url path */
    const STORELOCATOR_URL_PATH_EDIT = 'googlestorelocator/workingtime/edit';
    const STORELOCATOR_URL_PATH_DELETE = 'googlestorelocator/workingtime/delete';

    /** @var UrlBuilder */
    protected $actionUrlBuilder;
    /** @var UrlInterface */
    protected $urlBuilder;

    /**
     * @var string
     */
    private $editUrl;

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlBuilder $actionUrlBuilder
     * @param UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     * @param string $editUrl
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlBuilder $actionUrlBuilder,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = [],
        $editUrl = self::STORELOCATOR_URL_PATH_EDIT
    ) {
        $this->urlBuilder = $urlBuilder;
        $this->actionUrlBuilder = $actionUrlBuilder;
        $this->editUrl = $editUrl;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $name = $this->getData('name');
                if (isset($item['time_id'])) {
                    $item[$name]['edit'] = [
                        'href' => $this->urlBuilder->getUrl($this->editUrl, ['time_id' => $item['time_id']]),
                        'label' => __('Edit')
                    ];
                    $item[$name]['delete'] = [
                        'href' => $this->urlBuilder->getUrl(self::STORELOCATOR_URL_PATH_DELETE,
                            ['time_id' => $item['time_id']]
                        ),
                        'label' => __('Delete'),
                        'confirm' => [
                            'title' => __('Delete \"${ $.$data.name }\"'),
                            'message' => __('Are you sure you wan\'t to delete a \"${ $.$data.name }\" record?')
                        ]
                    ];
                }
            }
        }

        return $dataSource;
    }
}
