<?php
/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 10.04.17
 */
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once "classes/PhpFormBuilder.php";

?>

    <!DOCTYPE HTML>
    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>

    <body>
<?php

$form = new PhpFormBuilder();
$form->set_att('method', 'post');
$form->set_att('class', 'form-group');

$form->add_inputs(array(
    array('Is new customer'),
    array('Other Ref'),
    array('Company Name'),
    array('Web User'),
    array('Mailing Status'),
    array('Company Class'),
    array('Compane Type'),
    array('Company Code')
    ));
$form->build_form();
?>
    </body>
</html>