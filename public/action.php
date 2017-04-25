<?php
/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 29.03.17
 */

$path = dirname(dirname(__FILE__));
require_once($path . '/vendor/autoload.php');

use Generate\Form\CustomForm;
use Generate\Xml\XmlExportFactory as Factory;

$dataArray = $_POST;
$dataObj = new ArrayObject($dataArray);

/** @TODO Afterall you don't do nothing with $action. WHy it here? + ->
 * It determinate 'is_new_customer' value from $dataObj for use it at the Xmlfile.
 */
CustomForm::determinateCustomer($dataObj);

$factory = new Factory();
$xmlBuilder = $factory->getBuilder('CustomerExport');
/** @TODO I would recommend you to define and use some setter for filename and build XML only passing dataObject + */
$xmlBuilder->buildXml($dataObj);

/** @TODO XML name at the moment will always set. so here is no need in this check + */

