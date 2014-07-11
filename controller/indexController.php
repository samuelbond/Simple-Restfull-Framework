<?php
/**
 *
 * Simple MVC Framework aka Baseframework
 * @version 2.0
 *
 * Created By Samuel Izuchi Amaziro
 * Copyright 2014 Plati Tech Limited, All Rights Reserved
 */

namespace controller;


use application\BaseController;
use component\cms\Cms;


class indexController extends BaseController{

    public function index()
    {
        /**
        @session_start();
        if(isset($_SESSION['userid']))
        {
            $userComp = new usercomponent();
            $userComp->init();
            $expenComp = new expense();
            $expenComp->init();

            $userData = $userComp->getUserDetails($_SESSION['userid']);
            $this->registry->template->expense = $expenComp->getAllExpense();
            $this->registry->template->user = $userData;
            $this->registry->template->loadview("index");
        }
        else
        {
            header('Location: account');
        }
         */

      /*  echo("I am expense toString\n");
        echo $var = new cms();
       // $var->getNewFile();
        echo "\nI am alive";
        $string = "clientsecret".date("Y").date("m").date("d").date("H")."cancel";
        echo md5($string);
        echo("password\n");
        $options = [
            'cost'  => 11,
            'salt'  => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)
        ];
        echo $pass1 = password_hash("samuel", PASSWORD_BCRYPT, $options);
        $options = null;
        $options = [
            'cost'  => 11,
            'salt'  => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)
        ];
        echo("\n New password\n");
        echo $pass2 = password_hash("samuel", PASSWORD_BCRYPT, $options);

        if(password_verify('samuel', $pass1))
        {
            echo "samuel is the password";
        }
        else
        {
            echo "samuel was not verified as password";
        }*/

        $this->registry->template->loadview("login");
    }
}