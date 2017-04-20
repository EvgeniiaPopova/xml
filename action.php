<?php
/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 29.03.17
 */

require_once 'classes/BuilderAbstract.php';
require_once 'classes/CustomerExportBuilder.php';
require_once 'classes/CustomForm.php';

/** Factory */
require_once 'classes/ExportFactoryAbstract.php';
require_once 'classes/XmlExportFactory.php';

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
$factory = new XmlExportFactory();
$xmlBuilder = $factory->getBuilder('CustomerExport');
$xmlBuilder->buildXml($xmlName, $dataObj);

if (isset($xmlName)) {
    chmod($xmlName, 0777);
    header("Location: {$xmlName}");
}
