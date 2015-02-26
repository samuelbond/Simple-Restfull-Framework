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


    /**
     * The default action for all service
     * @RequestType (type="PUT")
     * @return array
     */
    public function index(){

        return array("welcome" => "Simple Restful Framework");
    }

    /**
     * @RequestType (type="GET")
     * @return array
     */
    public function helloworld()
    {
        return array("hello" => "world");
    }


} 