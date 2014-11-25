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

/**
 * Class BaseService
 * @package application
 */
Abstract class BaseService {

    protected $registry;
    /**
     * An array containing the name of each service in a class
     * and their HTTP request type as a key value pair
     * @var array
     */
    protected $types;

    /**
     * @param $registry
     */
    public function __construct($registry)
    {
        $this->registry = $registry;
    }

    /**
     * This method returns the HTTP type of a given service
     * @param $serviceName
     * @return HTTP Request Type
     */
    abstract public function getType($serviceName);


    /**
     * The default action for all service
     * @return mixed
     */
    abstract public function index();




}
