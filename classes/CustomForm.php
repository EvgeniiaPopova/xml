<?php

/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 20.04.17
 */

require_once '/var/www/xml/vendor/autoload.php';


class CustomForm
{
    const CUSTOMER_IS_NEW_YES = 'Yes';
    const CUSTOMER_IS_NEW_NO = 'No';

    function generateForm()
    {
        if (isset($_POST["form"])) {
            PFBC\Form::isValid($_POST["form"]);
            header("Location: " . $_SERVER["PHP_SELF"]);
            exit();
        }
        $form=new PFBC\Form("ExportOrdersForm");
//        $form = $this->_form;
        $form->configure(array(
            "prevent" => array("bootstrap", "jQuery", "focus"), 'action' => 'action.php'));
        $options = array(self::CUSTOMER_IS_NEW_YES, self::CUSTOMER_IS_NEW_NO);
        $form->addElement(new PFBC\Element\HTML('<legend>Export Orders Form</legend>'));
        $form->addElement(new PFBC\Element\Radio("Is new customer:", "is_new_customers", $options, array("required" => 1)));
        $form->addElement(new PFBC\Element\Textbox("Other Ref:", 'other_ref', array("required" => 1)));
        $form->addElement(new PFBC\Element\Textbox("Company Name:", 'company_name', array("required" => 1)));
        $form->addElement(new PFBC\Element\Textbox("Web User:", 'web_user', array("required" => 1)));
        $form->addElement(new PFBC\Element\Textbox("Mailing Status:", 'mailing_status', array("required" => 1)));
        $form->addElement(new PFBC\Element\Textbox("Company Class:", 'company_class', array("required" => 1)));
        $form->addElement(new PFBC\Element\Textbox("Company Type:", 'company_type', array("required" => 1)));
        $form->addElement(new PFBC\Element\Textbox("Company Code:", "company_code", array("required" => 1)));
        $form->addElement(new PFBC\Element\Button);
        return $form->render();

    }
}