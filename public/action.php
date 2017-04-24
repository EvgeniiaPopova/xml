<?php
/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 29.03.17
 */

require_once '/var/www/xml/vendor/autoload.php';

use Generate\Form\CustomForm;
use Generate\Xml\XmlExportFactory as Factory;

$dataArray = $_POST;
$dataObj = new ArrayObject($dataArray);

switch ($dataObj->offsetGet('is_new_customers')) {
    case CustomForm::CUSTOMER_IS_NEW_NO:
        $dataObj->offsetSet('is_new_customers', -1);
        break;
    case CustomForm::CUSTOMER_IS_NEW_YES:
    default:
        $dataObj->offsetSet('is_new_customers', 1);
}

$date = date("Y-m-d_H:i:s");
$xmlName = sprintf('xml_%s.xml', $date);
$factory = new Factory();
$xmlBuilder = $factory->getBuilder('CustomerExport');
$xmlBuilder->buildXml($xmlName, $dataObj);

if (isset($xmlName)) {
    chmod($xmlName, 0777);
    header("Location: {$xmlName}");
}
