<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 30/06/14
 * Time: 14:26
 */

namespace controller;


use application\basecontroller;
use client\client;

class clientInterfaceController extends basecontroller{

    public function index()
    {
        //header("Content-type: application/json");
        $client = new client();
        if(isset($_POST['getsession']))
        {

            $playerLogin = $_POST['pl'];
            $playerPass = $_POST['pp'];
            $secretKey = $_POST['sk'];
            $operator = $_POST['op'];
            if($result = $client->getSession($secretKey, $playerLogin, $playerPass, $operator) !== false)
            {
                echo $result;
                return;
            }
            else
            {
                echo "An error has occured";
                return;
            }
        }
        $this->registry->template->loadview("index");
    }

    public function controllerComponents(){
        return array("client");
    }
} 