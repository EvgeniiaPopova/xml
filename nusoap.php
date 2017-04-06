<?php
/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 29.03.17
 */


require_once 'nusoap/lib/nusoap.php';


ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);


$client = new nusoap_client('http://83.218.157.188:8081/test/khaosids.exe/wsdl/IKosWeb?wsdl');
//
$query = file_get_contents('test.xml');
$result = $client->call('ExportOrders', array($query));

echo '<h2>Запрос</h2>';
echo '<pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';