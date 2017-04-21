<?php
/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 07.04.17
 */


ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
require_once '../autoloader.php';

try {
    $config = new ConfigSoap('test');
    $options = $config->getOptions();
    $wsdl = $config->getWsdl();

    $client = new SoapClient($wsdl, $options);
    $responseXml = $client->ExportOrderStatus();

    $parser = new ParserXml();
    $parser->readXml($responseXml);

} catch (Exception $e) {
    print $e->getMessage();
}
