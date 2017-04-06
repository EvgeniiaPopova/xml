<?php

/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 02.04.17
 */
class XmlExportFactory extends ExportFactoryAbstract
{
    const XML_CUSTOMER_EXPORT = 'CustomerExport';

    public function getBuilder($type)
    {
        switch ($type) {
            case self::XML_CUSTOMER_EXPORT:
                $builder = new CustomerExportBuilder();
                break;
            default:
                $builder = new CustomerExportBuilder();
                break;
        }
        return $builder;
    }
}