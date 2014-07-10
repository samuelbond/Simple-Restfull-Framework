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


use application\basecontroller;
use component\cms\cms;


class indexController extends basecontroller{

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

        echo("I am expense toString\n");
        echo $var = new cms();
        $var->getNewFile();
        echo "\nI am alive";
        $string = "clientsecret".date("Y").date("m").date("d").date("H")."cancel";
        echo md5($string);
    }
}