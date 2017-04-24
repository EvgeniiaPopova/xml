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
    const WSDL_LOCATION = 'location';

    /**
     * @return string
     * @todo ADD SOME LOGIC
     */
    public function getWsdl()
    {
        $options = $this->getOptions();
        $wsdl = $options[self::WSDL_LOCATION];
        return $wsdl;
    }

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