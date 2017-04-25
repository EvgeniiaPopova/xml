<?php

/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 02.04.17
 */

namespace Generate;

/**
 * Class BuilderAbstract
 * @package Generate
 */
abstract class BuilderAbstract
{
    /**
     * @var \DOMDocument
     */
    protected $dom = null;

    /**
     * @param \ArrayObject $dataObj
     */
    abstract public function buildXml(\ArrayObject $dataObj);

    /**
     * BuilderAbstract constructor.
     */
    public function __construct()
    {
        $this->dom = $this->getDom();
    }

    /**
     * @return \DOMDocument|null
     */
    protected function getDom()
    {
        if (!isset($this->dom)) {
            $this->dom = new \DOMDocument();
        }
        return $this->dom;
    }

    /**
     * @param string $name
     */
    public function save($name)
    {
        $dom = $this->getDom();
        $dom->formatOutput = true;
        $dom->save($name);
    }
}
