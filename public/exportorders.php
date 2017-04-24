<?php
/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 21.04.17
 */

session_start();
/** @todo remove hard coded path */
require_once '/var/www/xml/vendor/autoload.php';
require_once 'header.php';

$form = new \Generate\Form\CustomForm();
$form->generate();