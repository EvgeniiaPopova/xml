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
    /**#@+ Form constants */
    const CUSTOMER_IS_NEW_YES = 'Yes';
    const CUSTOMER_IS_NEW_NO = 'No';
    /**#@- */

    /**
     * @var
     */
    protected $form;

    /**
     * @var array
     */
    protected $configure = array(
        "prevent" => array("bootstrap", "jQuery", "focus"), 'action' => 'action.php');

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
        $form = $this->getForm();
        /** @TODO Better define getter and then use it here */
        $config = $this->configure;

        $form->configure($config);
        $options = array(self::CUSTOMER_IS_NEW_YES, self::CUSTOMER_IS_NEW_NO);
        $form->addElement(new Element\HTML('<legend>Export Orders Form</legend>'));
        $form->addElement(new Element\Radio("Is new customer:", "is_new_customers", $options, array("required" => 1)));
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
     * @TODO not the best naming for method
     * @param \ArrayObject $dataObj
     */
    public function action(\ArrayObject $dataObj)
    {
        switch ($dataObj->offsetGet('is_new_customers')) {
            case self::CUSTOMER_IS_NEW_NO:
                $dataObj->offsetSet('is_new_customers', -1);
                break;
            case self::CUSTOMER_IS_NEW_YES:
            default:
                $dataObj->offsetSet('is_new_customers', 1);
        }
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
            $this->setForm(new Form("ExportOrdersForm"));
        }
        return $this->form;
    }
}
