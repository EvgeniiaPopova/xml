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
    /**
     *
     * @TODO Please don't just repeat my code.
     * Operator @#+/- using only for multiple similar constants.
     * Below is example how it should be done in case if we have 1 constant.
     * DON'T FORGET ABOUT NEW LINE AT THE END OF THE FILE
     */

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
