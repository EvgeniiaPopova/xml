<?php

/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 02.04.17
 */

namespace Generate;

abstract class BuilderAbstract
{
    protected $_dom = '';

    abstract public function buildXml($name, \ArrayObject $dataObj);

    public function __construct()
    {
        $this->_dom = new \DOMDocument('1.0');
    }

    protected function _getDom()
    {
        if (!isset($this->_dom)) {
            $this->_dom = new \DOMDocument();
        }
        return $this->_dom;
    }

    public function save($name)
    {
        $dom = $this->_dom;
        $dom->formatOutput = true;
        $dom->save($name);
    }
}
