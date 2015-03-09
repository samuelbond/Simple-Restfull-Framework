<?php
/**
 *
 * Simple Restful Framework
 * @version 1.0
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


$router = new \application\Router();
$route = "";
$route = @$_GET['rt'];
$route = preg_replace('/(\.php)$/i', '', $route);

$response = null;
try
{
    $response = $router->loadService($route, APP_PATH."service".DIRECTORY_SEPARATOR);
}
catch (\Exception $ex)
{
    $response = array("error" => $ex->getMessage());
}

/**
 * If system output is enabled the output of the
 * Requested service will be printed out
 */
if(\application\System::getSystemOutput())
{
    header('Content-Type: application/'.\application\System::getApplicationType());

    $out = new \response\ResponseWrapper(strtoupper(\application\System::getApplicationType()), $response);
    echo $out->getOutput();
}

//End
