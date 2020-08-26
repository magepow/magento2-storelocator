<?php

namespace Magepow\StoreLocator\Model\StoreLocator\Source\Config;

class Config implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Scroll modes
     *
     * @var array
     */
    protected $modes = [
        'VN' => 'Viet Nam',

        'AF'  => 'Afghanistan',
        'AL'  => 'Albania',
        'DZ'  => 'Algeria',
        'AS'  => 'American Samoa',
        'AD'  => 'Andorra',
        'AO'  => 'Angola',
        'AI'  => 'Anguilla',
        'AQ'  => 'Antarctica',
        'AG'  => 'Antigua &amp; Barbuda',
        'AR'  => 'Argentina',
        'AM'  => 'Armenia',
        'AW'  => 'Aruba',
        'AU'  => 'Australia',
        'AT'  => 'Austria',
        'AZ'  => 'Azerbaijan',
        'BS'  => 'Bahamas',
        'BH'  => 'Bahrain',
        'BD'  => 'Bangladesh',
        'BB'  => 'Barbados',
        'BY'  => 'Belarus',
        'BE'  => 'Belgium',
        'BZ'  => 'Belize',
        'BJ'  => 'Benin',
        'BM'  => 'Bermuda',
        'BT'  => 'Bhutan',
        'BO'  => 'Bolivia',
        'BA'  => 'Bosnia &amp; Herzegovina',
        'BW'  => 'Botswana',
        'BV'  => 'Bouvet Island',
        'BR'  => 'Brazil',
        'IO'  => 'British Indian Ocean Territory',
        'VG'  => 'British Virgin Islands',
        'BN'  => 'Brunei',
        'BG'  => 'Bulgaria',
        'BF'  => 'Burkina Faso',
        'BI'  => 'Burundi',
        'KH'  => 'Cambodia',
        'CM'  => 'Cameroon',
        'CA'  => 'Canada'

    ];

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options = [];

        foreach ($this->modes as $mode => $label) {
            $options[] = [
                'value' => $mode,
                'label' => __($label)
            ];
        }

        return $options;
    }
}
