<?php
/**
 *
 * Simple MVC Framework aka Baseframework
 * @version 2.0
 *
 * Created By Samuel Izuchi Amaziro
 * Copyright 2014 Plati Tech Limited, All Rights Reserved
 */


/**
 * Bootstrap
 */
require_once "bootstrap.php";


/**
 *
 * Registry Settings
 * Here we call necessary configurations
 * such as routing, database e.t.c
 * And we register them so they can be accessible
 * Application Wide
 */


$registry = new \application\Registry();
$registry->router = new \application\Router($registry);
$route = "";
$route = @$_GET['rt'];
$response = null;
try
{
    $response = $registry->router->loadService($route, _SITE_PATH."services".DIRECTORY_SEPARATOR);
}
catch (\Exception $ex)
{
    echo $ex->getMessage();
    return;
}

$out = new \response\ResponseWrapper($settings['response_type'], $response);
echo $out->getOutput();

//End
