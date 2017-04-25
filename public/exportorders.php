<?php
/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 21.04.17
 */

session_start();
$path = dirname(dirname(__FILE__));
require_once($path . '/vendor/autoload.php');

use Generate\Form\CustomForm as CustomForm;

$form = new CustomForm();
echo $form->generate();
