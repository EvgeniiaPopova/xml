<?php

/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 02.04.17
 */

namespace Generate;

/**
 * @todo add PHPDoc block for method and type hints +
 * Class ExportFactoryAbstract
 * @package Generate
 */
abstract class ExportFactoryAbstract
{
    /**
     * @param string $type Xml type method
     * @return mixed
     */
    abstract public function getBuilder($type);
}