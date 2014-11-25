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
use application\HTTP;

class indexService extends BaseService{

    protected $types = array(
        "index" => "GET",
        "randomNumber" => "GET",
    );

    /**
     * The default action for all service
     * @return array
     */
    public function index(){
        return array("status" => "Rest is alive");
    }


    public function randomNumber()
    {
        return array("number is: " => rand(100, 1000));
    }

    /**
     * This method returns the HTTP type of a given service
     * @param $serviceName
     * @return HTTP Request Type
     */
    public function getType($serviceName)
    {
       return ((isset($this->types[$serviceName])) ? $this->types[$serviceName] : "NONE");
    }


} 