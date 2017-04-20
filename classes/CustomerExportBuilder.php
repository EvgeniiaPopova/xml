<?php

/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 02.04.17
 */

require_once '/var/www/xml/vendor/spatie/array-to-xml/src/ArrayToXml.php';
use Spatie\ArrayToXml\ArrayToXml;

class CustomerExportBuilder extends BuilderAbstract
{
    public function __construct()
    {
        parent::__construct();
    }

    public function createStructure()
    {



        $testarr=array('IsNewCustomer'=>'34', 'CompanyCode' => '45');
//$arr=$_REQUEST;
        $arr=$testarr;
        $result = ArrayToXml::convert($arr, 'CustomerDetails', false);
        $xml = new SimpleXMLElement($result);
        echo $xml->asXML('testnew.xml');

    }
    public function buildXml()
    {
        $this->_getDom();
        $this->createStructure();
        $this->save();
    }

}
