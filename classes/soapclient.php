<?php

/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 03.04.17
 */
class Сlient
{
    public function __construct()
    {
//        $params = array('trace' => 1);
        $this->instance = new soapclient('http://83.218.157.188:8081/test/khaosids.exe/wsdl/IKosWeb', 'test.xml');

    }

    public function getExportCustomers()
    {

        return $this->instance->call('xmlresponse.xml');
    }

}

