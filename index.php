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

$model = new \model\databaseutil();
$registry = new \application\registry();
$registry->model = $model;
$registry->router = new \application\router($registry);
$registry->template = new \application\template($registry);
$registry->template->setViewPath($sitepath."/view/");
$route = "";
$route = @$_GET['rt'];
echo $route;
$registry->router->loadController($route, $sitepath."/controller/");

//End