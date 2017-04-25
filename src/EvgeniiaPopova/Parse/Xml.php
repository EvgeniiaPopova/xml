<?php

/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 21.04.17
 */

namespace Parse;

/** @TODO bad naming for class - namespace has one value and class has another + */
class Xml
{
    /** @todo Where is method's access modifier?????. Decompose logic */

    /** @var \XMLReader */
    public $reader;
    /** @var array */
    protected $resultRows;

    /**
     * Set $reader object
     * @param \XMLReader $reader
     */
    public function setReader(\XMLReader $reader)
    {
        $this->reader = $reader;
    }

    /**
     * Get $reader object
     * @return \XMLReader
     */
    public function getReader()
    {
        if (empty($this->reader)) {
            $this->setReader(new \XMLReader());
        }
        return $this->reader;
    }

    /**
     * @TODO where method access modifier???
     * @param $responseXml
     */
    public function readXml($responseXml)
    {
        $reader = $this->getReader();
        $reader->XML($responseXml, NULL, 0);
        /** @TODO At the moment don't understand what is going on here (I don't know how to finish this, need help) */

        while ($reader->read()) {
            if ($reader->nodeType == \XMLReader::ELEMENT && $reader->localName == 'ORDER') {
                $data = array();
                $data['id'] = $reader->getAttribute('ID');
                $data['ref'] = $reader->getAttribute('REF');
                $data['urn'] = $reader->getAttribute('URN');

                if ($reader->nodeType == \XMLReader::TEXT) {
                    $data['value'] = $reader->value;
                    foreach ($data as $item => $value) {
                        $row = sprintf('%s = %s %s', $item, $value, PHP_EOL);
                    }
                    $this->resultRows[] = $row;
                }
            }
        }
    }

    /**
     * get Result after parsing
     * @return array
     */
    public function getResultRows()
    {
        return $this->resultRows;
    }
}

   

