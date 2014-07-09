<?php
/**
 * Created by PhpStorm.
 * User: s.amaziro
 * Date: 11/04/14
 * Time: 12:42
 */

namespace controller;


use application\basecontroller;
use expense\expense;

class expensemanagerController extends basecontroller{

    public function index()
    {
        @session_start();
        if(isset($_SESSION['userid']))
        {
            $user = $_SESSION['userid'];
            $expenseComp = new expense();
            $expenseComp->init();

            if(isset($_GET['view_category']))
            {
                $category = $_GET['view_category'];
                $this->registry->template->expense = $expenseComp->getAllExpenseInCategory($category,$user);
                $this->registry->template->loadview("view_expense_list");
                return null;
            }

        }
    }


    public function controllerComponents()
    {
        return array("expense");
    }

} 