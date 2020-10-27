<?php
spl_autoload_register('myAutoLoader');

function myAutoLoader($className)
{
    $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    if (strpos($url, 'includes') !== false) {
        $path = __DIR__ . "../../classes/";
    } else {
        $path = __DIR__ . '/../classes/';
    }

    $ext = ".class.php";
    require_once $path . $className . $ext;
}
