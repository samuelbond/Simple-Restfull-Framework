<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 10/07/14
 * Time: 17:38
 */

namespace component\usermanagement;


class LoginManager {

    private $modelFacade;


    public function __construct()
    {
        $this->modelFacade = new UserManagementModelFacade();
    }

    public function verifyUser($user, $pass)
    {
        $u = $this->modelFacade->fetchUserByUsername($user);
        if(password_verify($pass, $u->getPassword()) )
        {
            return true;
        }

        return false;
    }
} 