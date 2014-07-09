<?php
/**
 * Created by PhpStorm.
 * User: s.amaziro
 * Date: 25/03/14
 * Time: 12:30
 */

namespace controller;


use application\basecontroller;
use usercomponent\usercomponent;

class settingsController extends basecontroller{

    public function index()
    {
        @session_start();
        if(isset($_SESSION['userid']))
        {
            $usercomp = new usercomponent();
            $userId = $_SESSION['userid'];

            if(isset($_POST['name']))
            {
                $cName = $_POST['cName'];
                $name = $_POST['name'];
                $cAddress = $_POST['cAddress'];
                $acct = $_POST['accounts'];
                $email = $_POST['myemail'];

                if($usercomp->updateDetails($userId,$name, $email, $acct, $cName, $cAddress))
                {
                    $this->registry->template->msg = "Your details has been updated";
                }
                else
                {
                    $this->registry->template->error = "Failed to update your details";
                }
            }

            if(isset($_POST['password']))
            {
                $password = $_POST['password'];

                if($usercomp->updatePassword($password, $userId))
                {
                    $this->registry->template->msg = "Your password has been updated";
                }
                else
                {
                    $this->registry->template->error = "Failed to update your password";
                }
            }



            $this->registry->template->userData = $usercomp->getUserDetails($_SESSION['userEmail']);
            $this->registry->template->loadview("user_settings");
            return null;

        }
        else
        {
            header("Location: account");
        }
    }


    public function controllerComponents()
    {
        return array("usercomponent");
    }

} 