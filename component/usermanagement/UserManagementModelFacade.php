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

use component\logs\Logs;
use exceptions\ApplicationException;
use model\usermanagement\Privileges;
use model\usermanagement\Profiles;
use model\usermanagement\Status;
use model\usermanagement\Users;

class UserManagementModelFacade {

    private $entityManager;

    public function __construct()
    {
        $this->entityManager = EntityManager::createEntityManager();
    }


    public function fetchUserByUsername($username)
    {
        $user = $this->entityManager->createQueryBuilder('User')
            ->field('username')->equals($username)
            ->getQuery()
            ->getSingleResult();

        return $user;
    }


    public function insertUser(array $userdetails)
    {
        $users = new Users();
        $profile = new Profiles();

        // User Profile
        $profile->setCity($userdetails['city']);
        $profile->setCountry($userdetails['country']);
        $profile->setFirstName($userdetails['fname']);
        $profile->setLastName($userdetails['lname']);
        $profile->setPhone1($userdetails['phone1']);
        $profile->setPhone2($userdetails['phone2']);
        $profile->setStreet($userdetails['street']);
        $profile->setPostCode($userdetails['pcode']);


        $users->setUsername($userdetails['user']);
        $users->setPassword($userdetails['pass']);
        $users->setUserId($this->random_generator(5));
        $users->setProfile($profile);

        try{
            $privilege = $this->entityManager->find("model\usermanagement\Privileges", 1);
            $users->setPrivilege($privilege);
            $status = $this->entityManager->find("model\usermanagement\Status", 3);
            $users->setStatus($status);
            $this->entityManager->persist($users);
            $this->entityManager->flush();
        }catch (\Exception $ex)
        {
            (new Logs())->doLogging("Application Error in ".get_class($this)." with message: ".$ex->getMessage());
            throw new ApplicationException($ex->getMessage());
        }

        return true;
    }


    public function random_generator($digits)
    {
        srand ((double) microtime() * 10000000);
        //Array of alphabets
        $input = array ("A", "B", "C", "D", "E","F","G","H","I","J","K","L","M","N","O","P","Q",
            "R","S","T","U","V","W","X","Y","Z");

        $random_generator="";// Initialize the string to store random numbers
        for($i=1;$i<$digits+1;$i++){ // Loop the number of times of required digits

            if(rand(1,2) == 1){// to decide the digit should be numeric or alphabet
                // Add one random alphabet
                $rand_index = array_rand($input);
                $random_generator .=$input[$rand_index]; // One char is added

            }
            else
            {

                // Add one numeric digit between 1 and 10
                $random_generator .=rand(1,10); // one number is added
            } // end of if else

        } // end of for loop

        return $random_generator;
    } //



} 