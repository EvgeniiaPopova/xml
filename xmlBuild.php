<?php

/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 30.03.17
 */

require_once 'classes/BuilderAbstract.php';
require_once 'classes/CustomerExportBuilder.php';

/** Factory */

require_once 'classes/ExportFactoryAbstract.php';
require_once 'classes/XmlExportFactory.php';

$factory = new XmlExportFactory();
$xmlBuilder = $factory->getBuilder('CustomerExport');
$xmlBuilder->buildXml();

