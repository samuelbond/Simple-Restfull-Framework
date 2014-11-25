<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 15/07/14
 * Time: 14:30
 */

namespace services;


use application\BaseService;
use application\HTTP;

class indexService extends BaseService{

    protected $types = array(
        "index" => "GET",
        "randomNumber" => "GET",
    );

    /**
     * The default action for all services
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