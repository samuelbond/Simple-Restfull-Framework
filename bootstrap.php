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
 * Site Path Settings
 * For unix servers check the forward slash character  http://fsl.fmrib.ox.ac.uk/fslcourse/unix_intro/files.html
 * For Windows servers check the backslash character http://msdn.microsoft.com/en-gb/library/windows/desktop/aa365247%28v=vs.85%29.aspx#paths
 */

$sitepath = realpath(dirname(__FILE__));
$sitepath = $sitepath.DIRECTORY_SEPARATOR;
define('_SITE_PATH', $sitepath);
define('APP_PATH', $sitepath.'src'.DIRECTORY_SEPARATOR);

/**
 * Site Bootstrapping
 *
 * Here we register all our autoloaders
 * So they all can fall through in case one fails
 */
$bootstrap = function($className){
    $path = _SITE_PATH.'src'.DIRECTORY_SEPARATOR.str_replace("\\", DIRECTORY_SEPARATOR, $className) . '.php';
    if(file_exists($path))
    {
        require_once $path;
    }};

spl_autoload_register($bootstrap);

$configuration = _SITE_PATH."configuration.php";

require_once $configuration;

//Composer autoloader
$composerAutoloader = _SITE_PATH."vendor".DIRECTORY_SEPARATOR."autoload.php";

require_once $composerAutoloader;



/**
 *
 * Environment Settings
 *
 */

define('APPLICATION_ENV', "development"); // Could be development or production

$dbDriver = new \driver\DatabaseDriver();

\application\System::setDatabaseDriver($dbDriver->loadDriver());