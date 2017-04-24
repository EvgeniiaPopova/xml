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

/** @TODO Afterall you don't do nothing with $action. WHy it here? */
$action = new CustomForm();
$action->action($dataObj);

$date = date("Y-m-d_H:i:s");
$xmlName = sprintf('xml_%s.xml', $date);
$factory = new Factory();
$xmlBuilder = $factory->getBuilder('CustomerExport');
/** @TODO I would recommend you to define and use some setter for filename and build XML only passing dataObject */
$xmlBuilder->buildXml($xmlName, $dataObj);

/** @TODO XML name at the moment will always set. so here is no need in this check */
if (isset($xmlName)) {
    chmod($xmlName, 0777);
    header("Location: {$xmlName}");
}
