<?php
/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 21.04.17
 */

spl_autoload_register ('autoload');
function autoload($className)
{
    $filename = 'classes/'.$className . '.php';
    include $filename;
}