<?php

/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 02.04.17
 */

namespace Generate\Xml;

use Generate\ExportFactoryAbstract;

class XmlExportFactory extends ExportFactoryAbstract
{
    /** @const Xml Type Method Constant */
    const XML_CUSTOMER_EXPORT = 'CustomerExport';

    /**
     * @param string $type
     * @return CustomerExportBuilder
     */
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
