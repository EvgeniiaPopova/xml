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

/** @TODO Change logic + (new class CustomRadio) */
$factory = new Factory();
$xmlBuilder = $factory->getBuilder('CustomerExport');
$xmlBuilder->buildXml($dataObj);
