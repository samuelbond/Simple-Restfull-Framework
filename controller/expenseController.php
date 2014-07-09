<?php
/**
 * Created by PhpStorm.
 * User: s.amaziro
 * Date: 20/03/14
 * Time: 13:04
 */

namespace controller;


use application\basecontroller;
use expense\expense;

class expenseController extends basecontroller {

    public function index()
    {
        @session_start();
        if(isset($_SESSION['userid']))
        {
            $user = $_SESSION['userid'];
            $expenseComp = new expense();
            $expenseComp->init();

            if(isset($_POST['cTitle']))
            {
                $ctitle = $_POST['cTitle'];
                $cType = $_POST['cType'];
                $expenseComp->addNewExpenseCategory($cType, $ctitle, $user);
                $this->registry->template->category = $expenseComp->getAllUserExpenseCategory($user);
                $this->registry->template->loadview("view_expense_category");
                return null;
            }
            if(isset($_POST['exCat']))
            {
                $expenseCat = $_POST['exCat'];
                $expenseTitle = $_POST['exTitle'];
                $expenseDate = $_POST['exDate'];
                $expenseAmount = $_POST['amount'];
                $expenseComment = $_POST['exComment'];

                if(isset($_FILES['exUpload']['name']) && $_FILES['exUpload']['name'] != "")
                {
                    $fileArray = $expenseComp->reArrayFiles($_FILES['exUpload']);
                    $expenseComp->uploadMultipleFiles($fileArray);

                }

                $expenseComp->addNewExpense($expenseCat,$expenseTitle,$expenseAmount,$expenseDate,$expenseComment,$user);
                $this->registry->template->category = $expenseComp->getAllUserExpenseCategory($user);
                $this->registry->template->loadview("view_expense_category");
            }



            if(isset($_GET['new_expense']))
            {
                $this->registry->template->category = $expenseComp->getAllUserExpenseCategory($user);
                $this->registry->template->loadview("new_expense");
                return null;
            }
            elseif(isset($_GET['new_category']))
            {
                $this->registry->template->types = $expenseComp->getAllExpenseType();
                $this->registry->template->loadview("new_expense_category");
                return null;
            }
            elseif(isset($_GET['view_expense_cat']))
            {
                $this->registry->template->category = $expenseComp->getAllUserExpenseCategory($user);
                $this->registry->template->loadview("view_expense_category");
                return null;
            }


        }
        else
        {
            header("Location: account");
        }
    }

    public function controllerComponents()
    {
        return array("expense");
    }
} 