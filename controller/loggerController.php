<?php
/**
 * Created by PhpStorm.
 * User: s.amaziro
 * Date: 24/03/14
 * Time: 16:55
 */

namespace controller;


use application\basecontroller;
use logs\logs;

class loggerController extends basecontroller{

    public function index()
    {
        $logs = new logs();

        if(isset($_GET['logmsg']))
        {
            $type = null;
            $message = $_GET['logmsg'];
            if(isset($_GET['logtype']))
            {
                $type = $_GET['logtype'];
            }
            $logs->setMessage($message);
            $logs->setType($type);
            $logs->init();
            $logs->doLogging();
            echo json_encode("done");
        }
    }


    public function controllerComponents()
    {
        return array("logs");
    }

} 