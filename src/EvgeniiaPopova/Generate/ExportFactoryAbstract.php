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
     * @param string $type Xml type method
     */
    abstract public function getBuilder($type);
}
