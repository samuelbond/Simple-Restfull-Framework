<?php
/**
 * Created by PhpStorm.
 * User: s.amaziro
 * Date: 11/04/14
 * Time: 16:10
 */

namespace controller;


use application\basecontroller;
use expense\expense;

class attachedfilesController extends basecontroller{

    public function index()
    {
        @session_start();

        if(isset($_SESSION['userid']))
        {
            $userId = $_SESSION['userid'];
            $expenseComp = new expense();
            $expenseComp->init();

            if(isset($_GET['expense']))
            {
                $expenseId = $_GET['expense'];
                $list = $expenseComp->getDocuments($expenseId);
                $this->registry->template->files = $list;
                $this->registry->template->loadview("view_files");
                return null;
            }
            else
            {
                header("Location: index");
            }
        }
    }


    public function controllerComponents()
    {
        return array("expense");
    }

} 