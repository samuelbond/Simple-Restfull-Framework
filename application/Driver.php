<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 26/02/15
 * Time: 10:50
 */

namespace application;


use Doctrine\ORM\EntityManager;

abstract class Driver {

    /**
     * @return mixed |\mysqli|\PDO|EntityManager
     */
    public abstract function loadDriver();
} 