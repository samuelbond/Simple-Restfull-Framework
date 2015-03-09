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
     * @param $registry
     */
    public function __construct($registry)
    {
        $this->registry = $registry;
    }

    public function successfulRequest()
    {
        return array("success" => "request was successful", "status" => 0);
    }

    /**
     * The default action for all service
     * @RequestType (type="GET")
     * @return mixed
     */
    abstract public function index();




}
