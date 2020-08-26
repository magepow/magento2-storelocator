<?php
namespace Magepow\StoreLocator\Controller;

class Router implements \Magento\Framework\App\RouterInterface
{

    protected $actionFactory;
    protected $_response;
    protected $_request;
    protected $pageRepository;

    public function __construct(
        \Magento\Framework\App\ActionFactory $actionFactory,
        \Magento\Framework\App\RequestInterface $request,
        \Magepow\StoreLocator\Helper\Data $helper,
        \Magento\Cms\Api\PageRepositoryInterface $pageRepository,
        \Magento\Framework\App\ResponseInterface $response
    ) {
        $this->actionFactory = $actionFactory;
        $this->_request = $request;
        $this->pageRepository = $pageRepository;
        $this->_response = $response;
        $this->googleMapsStoreHelper = $helper;
    }

    public function match(\Magento\Framework\App\RequestInterface $request)
    {
        $route = $this->googleMapsStoreHelper->getGMapSeoIdentifier();
        $suffix = $this->googleMapsStoreHelper->getGMapSeoSuffix();
        $identifier = trim($request->getPathInfo(), '/');
        $identifie = $route.$suffix;

        if (strcmp($identifie, $identifier)==0) {
            $request->setModuleName('storelocator')->setControllerName('Index')->setActionName('Index');
            $request->setAlias(\Magento\Framework\Url::REWRITE_REQUEST_PATH_ALIAS, $identifier);
        } else {
            return;
        }

        return $this->actionFactory->create(
            'Magento\Framework\App\Action\Forward',
            ['request' => $request]
        );
    }
}
