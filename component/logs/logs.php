<?php
/**
 * Created by PhpStorm.
 * User: s.amaziro
 * Date: 24/03/14
 * Time: 16:45
 */

namespace component\logs;


use application\basecomponent;

class logs extends basecomponent{

    private $message;
    private $type;

    public function __construct($message = null, $type=null)
    {
        $this->message = $message;
        $this->type = $type;
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

    public function doLogging()
    {
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
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
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