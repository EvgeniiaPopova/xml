<?php

/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 21.04.17
 */

namespace Parse\Xml;

class Parser
{
    /** @todo Where is method's access modifier?????. Decompose logic */

    public $reader;

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

    public function generateArrays($reader)
    {
        while ($reader->read()) {
            if ($reader->nodeType == \XMLReader::ELEMENT) {
                if ($reader->localName == 'ORDER') {
                    $data = array();
                    $data['id'] = $reader->getAttribute('ID');
                    $data['ref'] = $reader->getAttribute('REF');
                    $data['urn'] = $reader->getAttribute('URN');

                    $reader->read();
                    if ($reader->nodeType == \XMLReader::TEXT) {
                        $data['value'] = $reader->value;
                        $reader->read();
                        foreach ($data as $item => $value) {
                            switch ($item) {
                                case 'value':
                                    printf('%s = %s %s %s', $item, $value, PHP_EOL, PHP_EOL);
                                    break;
                                default:
                                    printf('%s=%s %s', $item, $value, PHP_EOL);
                                    break;
                            }
                        }
                    }
                }
            }
        }
    }

    public function readXml($responseXml)
    {
        $reader = $this->getReader();
        $reader->XML($responseXml, NULL, 0);
        $this->generateArrays($reader);
    }
}


$responseXml = "<?xml version=\"1.0\"?><ORDERS>
<ORDER ID='09' REF='7934' URN='4534'>
             </ORDER>
             <ORDER ID='09' REF='7934' URN='4534'>
             </ORDER>
             <ORDER ID='09' REF='7934' URN='4534'>
             </ORDER>
             <ORDER ID='09' REF='7934' URN='4534'>
             </ORDER>
    </ORDERS>";
$reader = new Parser();
$reader->readXml($responseXml);
print_r($reader);