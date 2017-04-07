<?php
/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 05.04.17
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

    $p = xml_parser_create();
    xml_parse_into_struct($p, $responseXML, $vals, $index);
    xml_parser_free($p);
    $count = count($vals);
    for ($i=1;$i<count($vals)-1;$i++) {
        $orderid = $vals[$i]['attributes']['ID'];
        $invoice = $vals[$i]['attributes']['INVOICE'];
        $ref = $vals[$i]['attributes']['REF'];
        $complete = $vals[$i]['attributes']['COMPLETE'];
        $urn = $vals[$i]['attributes']['URN'];

        echo "Order ID: {$orderid}</br>\n";
        echo "Invoice: {$invoice}</br>\n";
        echo "Ref: {$ref}</br>\n";
        echo "Complete: {$complete}</br>\n";
        echo "Urn: {$urn}</br>\n\n\n";
    }
//    print_r ($responseXML);
} catch (Exception $e) {
    print $e->getMessage();
}


    
