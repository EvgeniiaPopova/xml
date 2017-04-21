<?php
/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 07.04.17
 */


ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
require_once 'autoloader.php';

try {
    $config = new ConfigSoap('test');
    $options = $config->getOptions();

    $client = new SoapClient('https://83.218.157.188:443/test/khaosids.exe/wsdl/IKosWeb?wsdl', $options);
    $responseXml = $client->ExportOrderStatus();

    $parser = new ParserXml();
    $parser->readXml($responseXml);

} catch (Exception $e) {
    print $e->getMessage();
}
