<?php


namespace controller;


use application\BaseController;
use component\usermanagement\UserManagement;

class userController extends BaseController{
    public function index()
    {
        $userMngComponent = new UserManagement();

        if(isset($_POST['fname']))
        {
            if($userMngComponent->createNewUser($_POST['fname'],$_POST['lname'],$_POST['user'],$_POST['password'],
                $_POST['street'],$_POST['city'],$_POST['postcode'],$_POST['country'],$_POST['phone1'], $_POST['phone2']))
            {
                $this->registry->template->response = '<div class="alert alert-success" role="alert">User Added</div>';
            }
            else
            {
                $this->registry->template->response = '<div class="alert alert-danger" role="alert">Failed to add user</div>';
            }
        }

        $this->registry->template->loadview("user");
    }


} 