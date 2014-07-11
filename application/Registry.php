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


class Registry {

    private  $variables = array();


    public  function __set($index, $value){
        $this->variables[$index] = $value;
    }

    public function __get($index){
        return $this->variables[$index];
    }

}