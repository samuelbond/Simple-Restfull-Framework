<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 26/02/15
 * Time: 12:11
 */

namespace application;


class System {

    private static $databaseDriver;

    private static $applicationType = "json";

    public static function setDatabaseDriver($driver)
    {
        self::$databaseDriver = $driver;
    }

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


} 