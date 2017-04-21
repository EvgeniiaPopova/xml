<?php
/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 21.04.17
 */

session_start();
require_once '../autoloader.php';
require_once 'header.php';

$form = new CustomForm();
$form->generate();