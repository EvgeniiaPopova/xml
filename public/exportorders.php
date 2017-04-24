<?php
/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 21.04.17
 */

/** @todo remove hard coded path + */
session_start();
require_once '/var/www/xml/vendor/autoload.php';
require_once 'header.php';

use Generate\Form\CustomForm as CustomForm;

$form = new CustomForm();
$form->generate();