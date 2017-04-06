<?php
/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 05.04.17
 */
ini_set('soap.wsdl_cache_enabled',0);
ini_set('soap.wsdl_cache_ttl',0);
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);

$client = new SoapClient('http://83.218.157.188:8081/test/khaosids.exe/wsdl/IKosWeb?wsdl', array(
    'trace' => true,
    'exceptions'=>true
));

//print_r($client->__getFunctions());

$query = file_get_contents('test.xml');
$result = $client->__call('GetCompanyClass', array());
//$soaprequest = $client->__doRequest($query, 'http://83.218.157.188:8081/test/khaosids.exe/wsdl/IKosWeb?wsdl', 'urn:IKosWebIntf-IKosWeb#GetCompanyClass', 1, 0);

//$xml = simplexml_load_string($soaprequest);
//$xml->registerXPathNamespace('soap', 'http://schemas.xmlsoap.org/wsdl/soap/');
//foreach ($xml->xpath('//soap:body') as $item)
//{
//    print_r($item);
//}
//print ($xml);
//print_r($soaprequest);
print $result;