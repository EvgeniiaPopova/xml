<?php

/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 02.04.17
 */

namespace Generate;

/**
 * @TODO Why here was plus if var $dom hasn't PHPDoc????? Let alone other methods????
 *
 * Class BuilderAbstract
 * @package Generate
 */
abstract class BuilderAbstract
{
    protected $dom = '';

    abstract public function buildXml($name, \ArrayObject $dataObj);

    public function __construct()
    {
        $this->dom = new \DOMDocument('1.0');
    }

    protected function getDom()
    {
        if (!isset($this->dom)) {
            $this->dom = new \DOMDocument();
        }
        return $this->dom;
    }

    public function save($name)
    {
        $dom = $this->dom;
        $dom->formatOutput = true;
        $dom->save($name);
    }
}
