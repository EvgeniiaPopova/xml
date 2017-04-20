<?php

/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 13.04.17
 */
class Form
{
    public function open($method, $action)
    {
        echo "<form method='{$method}' action='{$action}'><br> \n";
    }

    public function inputtext($name, $placeholder)
    {
        echo "<label for='{$name}'>{$placeholder}</label><br> \n<input type='text' name='{$name}' id='{$name}' placeholder='{$placeholder}'><br> \n";
    }

    public function textarea($name, $placeholder)
    {
        echo "<textarea name='{$name}' placeholder='{$placeholder}'></textarea> <br> \n";
    }

    public function submit($text)
    {
        echo "<input type='submit' value='{$text}'> <br> \n";
    }

    public function close()
    {
        echo '</form>';
    }
}

class ExportOrdersForm extends Form
{
    public function getForm()
    {
        $form = new Form();
        $form->open('POST', 'action.php');
        $form->inputtext('isNewCustomer', "Is new customer");
        $form->inputtext('otherRef', 'Other Ref');
        $form->inputtext('companyname', 'Company Name');
        $form->inputtext('webuser', 'Web User');
        $form->inputtext('mailingStatus', 'Mailing Status');
        $form->inputtext('companyClass', 'Company Class');
        $form->inputtext('companyType', 'Company Type');
        $form->inputtext('companyCode', 'Company Code');
        $form->submit('Send');
        $form->close();
    }

    public function validateForm($data)
    {
        if (!$data['isNewCustomer'] || !$data['otherRef'] || !$data['companyname'] || !$data['webuser'] || !$data['mailingStatus'] || !$data['companyClass']) die('All values can\'t be empty');
        return true;
    }

    public function saveForm($data)
    {
        if (!$this->validateForm($data)) return false;
        return 'OK';
    }
}