<?php

/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 21.04.17
 */

namespace Generate\Soap;

use \Generate\Config;

class ConfigSoap extends Config
{
    /** @const Path alias for WSDL url in config */
    const WSDL_LOCATION = 'location';

    /**
     * Get Wsdl from array $options
     * @return string
     */
    public function getWsdl()
    {
        $options = $this->getOptions();
        $wsdl = 'https://83.218.157.188/test/khaosids.exe/wsdl/IKosWeb?wsdl';
        return $wsdl;
    }

    /**
     * Get options from config.yml
     * @return array
     */
    public function getOptions()
    {
        $options = parent::getOptions();
        $context = stream_context_create(array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        ));
        $options['stream_context'] = $context;
        return $options;
    }
}
