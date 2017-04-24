<?php

/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 02.04.17
 */

namespace Generate;

/**
 * Class ExportFactoryAbstract
 * @package Generate
 */
abstract class ExportFactoryAbstract
{
    /**
     * @TODO Where you see what kind of object or value will return this method? +?
     * @param string $type Xml type method
     * @return Xml\
     */
    abstract public function getBuilder($type);
}