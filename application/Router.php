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
use ReflectionClass;

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

        $serviceClass = '\\service\\'.$this->service;
        $serviceClass = new $serviceClass($this->registry);
        $this->clClass = $serviceClass;
        if(!is_callable(array($serviceClass, $this->action)))
        {
            $serviceAction = "index";
        }
        else{
            $serviceAction = $this->action;
        }

        $requestType = $this->parseRequestTypeAnnotation($this->requestTypeAnnotationReader(get_class($serviceClass), $serviceAction));

        if($_SERVER['REQUEST_METHOD'] !== $requestType)
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
            $this->service = "indexService";
        }

        if(empty($this->action))
        {
            $this->action = "index";
        }

        return $this->path.$this->service.".php";
    }


    /**
     * Parses a method of a given class to get all annotations in the doc
     * @param $class
     * @param string $method
     * @return array
     */
    public function requestTypeAnnotationReader($class, $method = "index")
    {
        $reflect = new ReflectionClass($class);
        $methodDoc = $reflect->getMethod($method)->getDocComment();
        preg_match_all("#@(RequestType\\s.*?)\\n#s", $methodDoc, $annotations);
        return $annotations[1];
    }


    /**
     * Parses a given class to get all annotations in the doc
     * @param $class
     * @return array
     */
    public function classAnnotationReader($class)
    {
        $reflect = new ReflectionClass($class);
        $methodDoc = $reflect->getDocComment();
        preg_match_all('#@(.*?)\n#s', $methodDoc, $annotations);
        return $annotations[1];
    }

    /**
     * Parses and returns the request type
     * @param array $annotation
     * @return string
     */
    protected function parseRequestTypeAnnotation(array $annotation)
    {
        $n = explode("=", $annotation[0]);
        $patterns[0] = "/\"/";
        $patterns[1] = "/\\)/";
        $str = preg_replace($patterns, "", $n[1]);

        return $str;
    }
}
