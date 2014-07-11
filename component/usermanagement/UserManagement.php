<?php
/**
 *
 * Simple MVC Framework aka Baseframework
 * @version 2.0
 *
 * Created By Samuel Izuchi Amaziro
 * Copyright 2014 Plati Tech Limited, All Rights Reserved
 */
namespace component\usermanagement;


use application\BaseComponent;

class UserManagement extends BaseComponent{

    private $modelFacade;


    public function __construct()
    {
       $this->modelFacade = new UserManagementModelFacade();
    }

    public function init()
    {

    }

    public function __toString()
    {
       return "usermanagement";
    }


    public function createNewUser($firstName, $lastName, $username, $password, $street, $city, $postCode, $country, $phone1, $phone2 = "", $status = null, $privilege = null)
    {
        $userDetails = [
            "fname"     => $firstName,
            "lname"     => $lastName,
            "user"      => $username,
            "pass"      => $this->hashMyPassword($password),
            "street"    => $street,
            "city"      => $city,
            "country"   => $country,
            "pcode"     => $postCode,
            "phone1"    => $phone1,
            "phone2"    => $phone2,
            "status"    => (($status) ? $status : 3),
            "privilege" => (($privilege) ? $privilege : 1)
        ];

        if($this->modelFacade->insertUser($userDetails))
        {
            return true;
        }

        return false;
    }

    public function hashMyPassword($password)
    {
        $options = [
            'cost'  => 11,
            'salt'  => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)
        ];

        return password_hash($password, PASSWORD_BCRYPT, $options);
    }




} 