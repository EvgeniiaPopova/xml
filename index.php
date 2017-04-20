<?php
session_start();
error_reporting(E_ALL);
include("PFBC/Form.php");

if (isset($_POST["form"])) {
    Form::isValid($_POST["form"]);
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit();
}

include("header.php");

use PFBC\Form;
use PFBC\Element;

$options = array("No", "Yes");
$form = new Form("ExportOrdersForm");
$form->configure(array(
    "prevent" => array("bootstrap", "jQuery", "focus"), 'action' => 'action.php'
));

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
$form->render();

include("footer.php");
