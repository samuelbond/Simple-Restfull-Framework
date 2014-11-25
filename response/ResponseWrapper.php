<?php
/**
 *
 * Simple MVC Framework aka Baseframework
 * @version 2.0
 *
 * Created By Samuel Izuchi Amaziro
 * Copyright 2014 Plati Tech Limited, All Rights Reserved
 */

namespace response;


class ResponseWrapper {

    private $supportedTypes = array(
        'JSON',
        'XML',
        'HTML'
    );

    private $output;

    public function __construct($type, $response)
    {
        if(in_array($type,$this->supportedTypes))
        {
            switch($type)
            {
                case 'JSON':
                    $this->JSONWrapper($response);
                    break;
                case 'XML':
                    $this->XMLWrapper($response);
                    break;
                case "HTML":
                    $this->HTMLWrapper($response);
                    break;
            }
        }else
        {
            $this->output = "Response type not supported";
        }
    }

    public function JSONWrapper($response)
    {
        if(is_array($response))
        {
            $this->output = json_encode($response);
        }else
        {
            $this->output = $response;
        }
    }

    public function XMLWrapper($response)
    {
        $this->output = $response;
    }

    public function HTMLWrapper($response)
    {
        $this->output = $response;
    }

    /**
     * @return mixed
     */
    public function getOutput()
    {
        return $this->output;
    }


}