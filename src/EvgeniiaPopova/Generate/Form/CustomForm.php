<?php

/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 20.04.17
 */

namespace Generate\Form;

use PFBC\Form as Form;
use PFBC\Element as Element;

class CustomForm
{
    /**#@+
     * Form constants
     */
    const CUSTOMER_IS_NEW_YES = 1;
    const CUSTOMER_IS_NEW_NO = -1;
    /**#@-*/

    /**
     * @var Form|null
     */
    protected $form = null;

    /**
     * @var array $configure
     */
    protected $config = array(
        'prevent' => array('bootstrap', 'jQuery', 'focus'),
        'action' => ''
    );
    /**
     * @var array
     */
    protected $options = array();

    /**
     * @param array $dataArray
     * @throws \Exception
     */
    public static function validate(array $dataArray)
    {
        if (isset($dataArray)) {
            if (Form::isValid($dataArray)) {
                throw new \Exception('bla ba bla');
            }
        }
    }

    /**
     * @return string
     */
    function generate()
    {
        /** @var \PFBC\Form $form */
        $form = $this->getForm();
        /** @var array $config */
        $config = $this->getConfig();
        $form->configure($config);
        $options = $this->getCustomerOptions();
        $form->addElement(new Element\HTML('<legend>Export Orders Form</legend>'));
        $form->addElement(new CustomRadio("Is new customer:", "is_new_customers", $options, array("required" => 1)));
        $form->addElement(new Element\Textbox("Other Ref:", 'other_ref', array("required" => 1)));
        $form->addElement(new Element\Textbox("Company Name:", 'company_name', array("required" => 1)));
        $form->addElement(new Element\Textbox("Web User:", 'web_user', array("required" => 1)));
        $form->addElement(new Element\Textbox("Mailing Status:", 'mailing_status', array("required" => 1)));
        $form->addElement(new Element\Textbox("Company Class:", 'company_class', array("required" => 1)));
        $form->addElement(new Element\Textbox("Company Type:", 'company_type', array("required" => 1)));
        $form->addElement(new Element\Textbox("Company Code:", "company_code", array("required" => 1)));
        $form->addElement(new Element\Button);
        return $form->render();
    }

    /**
     * @param \ArrayObject $dataObj
     * @return \ArrayObject
     */
    public static function determineCustomer(\ArrayObject $dataObj)
    {
        switch ($dataObj->offsetGet('is_new_customers')) {
            case self::CUSTOMER_IS_NEW_NO:
                $dataObj->offsetSet('is_new_customers', -1);
                break;
            case self::CUSTOMER_IS_NEW_YES:
            default:
                $dataObj->offsetSet('is_new_customers', 1);
        }
        return $dataObj;
    }

    /**
     * @param \PFBC\Form $form
     */
    public function setForm(Form $form)
    {
        $this->form = $form;
    }

    /**
     * @return \PFBC\Form
     */
    public function getForm()
    {
        if (empty($this->form)) {
            $this->setForm(new Form('ExportOrdersForm'));
        }
        return $this->form;
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        $action = $this->getActionConfig();
        $this->config['action'] = $action;
        return $this->config;
    }

    /**
     * Get options for field 'is_new_customer'
     * @return array
     */
    public function getCustomerOptions()
    {
        if (empty($this->options)) {
            $this->options = array(self::CUSTOMER_IS_NEW_YES, self::CUSTOMER_IS_NEW_NO);
        }
        return $this->options;
    }

    /**
     * @param string $filename name of action file
     */
    public function setActionConfig($filename)
    {
        $this->config['action'] = $filename;
    }

    /**
     * Get filename of form action file
     * @return string
     */
    public function getActionConfig()
    {
        if (empty($this->config['action'])) {
            $this->setActionConfig('action.php');
        }
        return $this->config['action'];
    }
}
