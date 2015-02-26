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


    /**
     * The default action for all service
     * @return mixed
     */
    abstract public function index();




}
