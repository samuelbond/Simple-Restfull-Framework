<?php
/**
 *
 * Simple MVC Framework aka Baseframework
 * @version 2.0
 *
 * Created By Samuel Izuchi Amaziro
 * Copyright 2014 Plati Tech Limited, All Rights Reserved
 */

namespace component\logs;


use application\basecomponent;

class logs extends basecomponent{

    private $message;
    private $type;

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        if($this->type === null)
        {
            $this->type = "applicationError.txt";
        }
        else
        {
            $this->type = "applicationLog.txt";
        }
    }

    public function __toString()
    {
        return "logs";
    }

    public function doLogging($msg)
    {
        $this->message = $msg;

        if(strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
        {
            error_log($this->message."\r\n", 3, _SITE_PATH.'log/'.$this->type);
        }
        else
        {
            error_log($this->message."\n", 3, _SITE_PATH.'log/'.$this->type);
        }

    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }



} 