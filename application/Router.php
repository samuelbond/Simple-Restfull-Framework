<?php
/**
 *
 * Simple Restful Framework
 * @version 1.0
 *
 * Created By Samuel Izuchi Amaziro
 * Copyright 2014 Plati Tech Limited, All Rights Reserved
 */

namespace application;


use exceptions\ApplicationException;
use exceptions\InvalidPathException;

/**
 * Class Router
 * @package application
 */
class Router {

    private $registry;
    private $path;
    private $service;
    private $action;
    public $clClass;

    /**
     * @param $registry
     */
    public function __construct($registry)
    {
        $this->registry = $registry;
    }

    /**
     * Sets the path to the requested service
     * @param $path
     * @throws \exceptions\InvalidPathException
     */
    public function setServicePath($path)
    {

        if(!(is_dir($path)))
        {
            throw new InvalidPathException("Invalid Path Exception\nInvalid Controller Path provided: ");
        }
        $this->path = $path;

    }

    /**
     * Load the requested Service
     * @param $route
     * @param $path
     * @throws \Exception
     * @return bool
     */
    public function loadService($route, $path)
    {

        $this->setServicePath($path);

        $serviceFile = $this->getServiceReady($route);

        if(!is_readable($serviceFile))
        {
            throw new ApplicationException("Unknown service, the service you have requested is unknown");
        }

        $serviceClass = '\\service\\'.$this->service."Service";
        $serviceClass = new $serviceClass($this->registry);
        $this->clClass = $serviceClass;
        if(!is_callable(array($serviceClass, $this->action)))
        {
            $serviceAction = "index";
        }
        else{
            $serviceAction = $this->action;
        }

        if($_SERVER['REQUEST_METHOD'] !== $serviceClass->getType($serviceAction))
        {
            throw new ApplicationException("Unknown request type, the service you have requested is unknown");
        }


        return $serviceClass->$serviceAction();
    }

    /**
     * Prepares the action of the requested service
     * @param $route
     * @return string
     */
    public function getServiceReady($route)
    {
        if(!is_null($route) && $route !== "" && $route !== " ")
        {
            $routeArray = explode("/", $route);
            $this->service = $routeArray[0];
            if(isset($routeArray[1]))
            {
                $this->action = $routeArray[1];
            }
        }

        if(empty($this->service))
        {
            $this->service = "index";
        }

        if(empty($this->action))
        {
            $this->action = "index";
        }

        return $this->path.$this->service."Service.php";
    }


}
