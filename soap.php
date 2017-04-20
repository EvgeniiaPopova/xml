<?php
/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 07.04.17
 */


ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);

try {
    $context = stream_context_create(array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    ));

    $options = array(
        'exceptions' => 1,
        'trace' => 1,
        'encoding' => 'UTF-8',
        'connection_timeout' => 30,
        'stream_context' => $context,
        'location' => 'https://83.218.157.188:443/test/khaosids.exe/soap/IKosWeb',
        'uri' => 'http://tempuri.org/'
    );
    $client = new SoapClient('https://83.218.157.188:443/test/khaosids.exe/wsdl/IKosWeb?wsdl', $options);
    $responseXML = $client->ExportOrderStatus();

    $reader = new XMLReader();
    $reader->XML($responseXML, NULL, 0);
    while ($reader->read()) {
        if ($reader->nodeType == XMLReader::ELEMENT) {
            if ($reader->localName == 'ORDER') {
                $data = array();
                $data['id'] = $reader->getAttribute('ID');
                $data['ref'] = $reader->getAttribute('REF');
                $data['urn'] = $reader->getAttribute('URN');


                $reader->read();
                if ($reader->nodeType == XMLReader::TEXT) {
                    $data['value'] = $reader->value;
                    $reader->read();
                    foreach ($data as $item => $value) {
                        switch ($item) {
                            case 'value':
                                printf('%s = %s %s %s', $item, $value, PHP_EOL, PHP_EOL);
                                break;
                            default:
                                printf('%s=%s %s', $item, $value, PHP_EOL);
                                break;
                        }
                    }
                }
            }


        }
    }


//    print_r ($responseXML);
} catch (Exception $e) {
    print $e->getMessage();
}
