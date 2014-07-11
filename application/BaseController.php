<?php
/**
 *
 * Simple MVC Framework aka Baseframework
 * @version 2.0
 *
 * Created By Samuel Izuchi Amaziro
 * Copyright 2014 Plati Tech Limited, All Rights Reserved
 */

namespace application;


Abstract class BaseController {

    protected $registry;

    public function __construct($registry)
    {
        $this->registry = $registry;
    }

    abstract public function index();




}