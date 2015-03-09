<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 26/02/15
 * Time: 12:11
 */

namespace application;


use driver\DatabaseDriver;

class System {

    private static $databaseDriver;

    private static $applicationType = "json";

    private static $systemOutput = true;

    public static function setDatabaseDriver($driver)
    {
        self::$databaseDriver = $driver;
    }

    /**
     * @return DatabaseDriver
     */
    public static function getDatabaseDriver()
    {
        return self::$databaseDriver;
    }

    /**
     * @param mixed $applicationType
     */
    public static function setApplicationType($applicationType)
    {
        self::$applicationType = $applicationType;
    }

    /**
     * @return mixed
     */
    public static function getApplicationType()
    {
        return self::$applicationType;
    }

    public static function enableSystemOutput()
    {
        self::$systemOutput = true;
    }

    public static function disableSystemOutput()
    {
        self::$systemOutput = false;
    }

    /**
     * @return boolean
     */
    public static function getSystemOutput()
    {
        return self::$systemOutput;
    }




} 