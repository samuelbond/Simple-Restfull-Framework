<?php
/**
 * @author bond
 * copyright 12/1/13
 */

namespace controller;


use application\basecontroller;
use usercomponent\usercomponent;


class accountController extends basecontroller{

    public function index()
    {
        @session_start();
        $error = null;
        $msg = array();
        $userComponent = new usercomponent();

        $userComponent->init();
        if(isset($_POST['email']) && isset($_POST['password']))
        {
            $username = $_POST['email'];
            $password = $_POST['password'];

            if($userComponent->login($username, $password))
            {
                header("Location: index");
                return null;
            }
            else
            {
                $error = $userComponent->getErrorMsg();
                $this->registry->template->error = $error;
            }
        }
        elseif(isset($_SESSION['userid']) && isset($_GET['logout']))
        {
            if($userComponent->logOut())
            {
                array_push($msg, "You have been Logged Out Successfully");
                $this->registry->template->msg = $msg;
            }
            else
            {
                $error = $userComponent->getErrorMsg();
                $this->registry->template->error = $error;
            }
        }
        elseif(isset($_SESSION['userid']))
        {
            header("Location: index");
        }


        $this->registry->template->loadview("login");
    }

    public function controllerComponents(){
        return array("usercomponent");
    }

}