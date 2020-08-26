<?php

namespace Magepow\StoreLocator\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\View\Asset\Repository;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\ObjectManagerInterface;

class Data extends AbstractHelper
{
    const XML_PATH_ENABLED                      =   'googlestorelocator/general/enable';
    const XML_GMAP_PAGE_TITLE                   =   'googlestorelocator/general/page_title';
    const XML_GMAP_IDENTIFIER                   =   'googlestorelocator/general/identifier';
    const XML_GMAP_PAGE_METAKEYWORD             =   'googlestorelocator/general/meta_keywords';
    const XML_GMAP_PAGE_METADESCRIPTION         =   'googlestorelocator/general/meta_description';
    const XML_GMAP_STANDARD_LATITUDE            =   'googlestorelocator/general/std_latitude';
    const XML_GMAP_STANDARD_LONGITUDE           =   'googlestorelocator/general/std_longitude';
    const XML_GMAP_STANDARD_STORETITLE          =   'googlestorelocator/general/std_strtitle';
    const XML_GMAP_STANDARD_DESCRIPTION         =   'googlestorelocator/general/std_strdescription';
    const XML_GMAP_PAGE_HEADING                 =   'googlestorelocator/general/page_heading';
    const XML_GMAP_PAGE_SUBHEADING              =   'googlestorelocator/general/page_subheading';
    const XML_GMAP_API_KEY                      =   'googlestorelocator/general/api_key';
    const XML_GMAP_HEADERLINK_ENABLE            =   'googlestorelocator/manage_links/link_enable';
    const XML_GMAP_HEADERLINK_TEXT              =   'googlestorelocator/manage_links/label_header';
    const XML_GMAP_FOOTERLINK_ENABLE            =   'googlestorelocator/manage_links/footer_link_enable';
    const XML_GMAP_FOOTERLINK_TEXT              =   'googlestorelocator/manage_links/label_footer';
    const XML_GMAP_SEO_IDENTIFIER               =   'googlestorelocator/seo_suffix/gmap_identifier';
    const XML_GMAP_SEO_SUFFIX                   =   'googlestorelocator/seo_suffix/url_suffix';
    const XML_GMAP_ZOOM                         =   'googlestorelocator/general/map_zoom';

    public function isEnabledInFrontend()
    {
        $isEnabled = true;
        $enabled = $this->scopeConfig->getValue(self::XML_PATH_ENABLED, ScopeInterface::SCOPE_STORE);
        if ($enabled == null || $enabled == '0') {
            $isEnabled = false;
        }
        return $isEnabled;
    }
    public function getGMapPageTitle()
    {

        return $this->scopeConfig->getValue(self::XML_GMAP_PAGE_TITLE, ScopeInterface::SCOPE_STORE);
    }
    public function getGMapMetaKeywords()
    {

        return $this->scopeConfig->getValue(self::XML_GMAP_PAGE_METAKEYWORD, ScopeInterface::SCOPE_STORE);
    }
    public function getGMapMetadescription()
    {

        return $this->scopeConfig->getValue(self::XML_GMAP_PAGE_METADESCRIPTION, ScopeInterface::SCOPE_STORE);
    }
    public function getGMapStandardLatitude()
    {

        return $this->scopeConfig->getValue(self::XML_GMAP_STANDARD_LATITUDE, ScopeInterface::SCOPE_STORE);
    }
    public function getGMapStandardLongitude()
    {

        return $this->scopeConfig->getValue(self::XML_GMAP_STANDARD_LONGITUDE, ScopeInterface::SCOPE_STORE);
    }
    public function getGMapStandardTitle()
    {

        return $this->scopeConfig->getValue(self::XML_GMAP_STANDARD_STORETITLE, ScopeInterface::SCOPE_STORE);
    }
    public function getGMapStandardDescription()
    {

        return $this->scopeConfig->getValue(self::XML_GMAP_STANDARD_DESCRIPTION, ScopeInterface::SCOPE_STORE);
    }
    public function getGMapPageHeading()
    {

        return $this->scopeConfig->getValue(self::XML_GMAP_PAGE_HEADING, ScopeInterface::SCOPE_STORE);
    }
    public function getGMapPageSubheading()
    {

        return $this->scopeConfig->getValue(self::XML_GMAP_PAGE_SUBHEADING, ScopeInterface::SCOPE_STORE);
    }
    public function getGMapAPIKey()
    {

        return $this->scopeConfig->getValue(self::XML_GMAP_API_KEY, ScopeInterface::SCOPE_STORE);
    }
    public function isHeaderLinkEnable()
    {

        return $this->scopeConfig->getValue(self::XML_GMAP_HEADERLINK_ENABLE, ScopeInterface::SCOPE_STORE);
    }
    public function getHeaderLinkLabel()
    {

        return $this->scopeConfig->getValue(self::XML_GMAP_HEADERLINK_TEXT, ScopeInterface::SCOPE_STORE);
    }
    public function isFooterLinkEnable()
    {

        return $this->scopeConfig->getValue(self::XML_GMAP_FOOTERLINK_ENABLE, ScopeInterface::SCOPE_STORE);
    }
    public function getFooterLinkLabel()
    {

        return $this->scopeConfig->getValue(self::XML_GMAP_FOOTERLINK_TEXT, ScopeInterface::SCOPE_STORE);
    }
    public function getGMapSeoSuffix()
    {

        return $this->scopeConfig->getValue(self::XML_GMAP_SEO_SUFFIX, ScopeInterface::SCOPE_STORE);
    }
    public function getGMapSeoIdentifier()
    {
        return $this->scopeConfig->getValue(self::XML_GMAP_SEO_IDENTIFIER, ScopeInterface::SCOPE_STORE);
    }
    public function getGMapLink()
    {
        $identifier = $this->getGMapSeoIdentifier();
        $seo_suffix = $this->getGMapSeoSuffix();
        return $identifier.$seo_suffix;
    }
    public function getGMapZoom()
    {
        if (self::XML_GMAP_ZOOM =='') {
            return 8;
        }
        return $this->scopeConfig->getValue(self::XML_GMAP_ZOOM, ScopeInterface::SCOPE_STORE);
    }
}
