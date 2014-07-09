<?php
/**
 *
 * Simple MVC Framework aka Baseframework
 * @version 2.0
 *
 * Created By Samuel Izuchi Amaziro
 * Copyright 2014 Plati Tech Limited, All Rights Reserved
 */

namespace model;


class databaseutil {

    private static  $db = "expense";
    private static  $user = "root";
    private static  $pass = "";
    private static  $host = "localhost";

   
  
    
    public static function doConnection()
    {
        $mysqli = new \mysqli(self::$host, self::$user, self::$pass, self::$db);
        if($mysqli->connect_errno)
        {
            return null;
        }
        return $mysqli;
    }


    
    
}