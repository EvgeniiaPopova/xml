<?php
/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 07.04.17
 */


ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
/** @TODO WHY HERE WAS A PLUS??? DID YOU REMOVE HARDCODED PATH????? + */
$path = dirname(dirname(__FILE__));
require_once($path . '/vendor/autoload.php');

use \Generate\Soap\ConfigSoap as ConfigSoap;
use \Parse\Xml as Parser;
try {
    $config = new ConfigSoap('test');
    $options = $config->getOptions();
    $wsdl = $config->getWsdl();

    $client = new SoapClient($wsdl, $options);
    $responseXml = $client->ExportOrderStatus();

    $parser = new Parser();
    $parser->readXml($responseXml);

} catch (Exception $e) {
    print $e->getMessage();
}
