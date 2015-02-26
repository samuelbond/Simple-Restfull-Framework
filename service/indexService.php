<?php
/**
 *
 * Simple Restful Framework
 * @version 1.0
 *
 * Created By Samuel Izuchi Amaziro
 * Copyright 2014 Plati Tech Limited, All Rights Reserved
 */

namespace service;


use application\BaseService;

/**
 * Class indexService
 * @package service
 */
class indexService extends BaseService{

    protected $types = array(
        "index" => "GET",
        "randomNumber" => "GET",
    );

    /**
     * The default action for all service
     * @param RequestType
     * @return array
     */
    public function index(){

        return array("message" => "hello world");
    }


    public function randomNumber()
    {
        return array("number is: " => rand(100, 1000));
    }

    /**
     * This method returns the HTTP type of a given service
     * @param $serviceName
     * @return string Request Type
     */
    public function getType($serviceName)
    {
       return ((isset($this->types[$serviceName])) ? $this->types[$serviceName] : "NONE");
    }


} 