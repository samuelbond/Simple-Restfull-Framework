<?php
/**
 *
 * Simple MVC Framework aka Baseframework
 * @version 2.0
 *
 * Created By Samuel Izuchi Amaziro
 * Copyright 2014 Plati Tech Limited, All Rights Reserved
 */

namespace autoloader;

class MyAutoloader
{

    public static function load($className)
    {
        $arry = array();
        $arry = explode("\\",$className);
        if(sizeof($arry) > 1)
        {
            $className = $arry[0].DIRECTORY_SEPARATOR.$arry[1];
        }
        $path = _SITE_PATH. $className . '.php';
        if(file_exists($path))
        {
            require_once $path;
        }

    }


    public static function componentLoad($className)
    {

        $arry = array();
        $arry = explode("\\",$className);
        if(sizeof($arry) > 1)
        {
            $className = $arry[0].DIRECTORY_SEPARATOR.$arry[1];
        }
        $path = _SITE_PATH."component/".$className . '.php';
        if(file_exists($path))
        {
            require_once $path;
        }
    }

    public static function modelLoad($className)
    {
        $arry = array();
        $arry = explode("\\",$className);

        if(sizeof($arry) > 1)
        {
            $className = $arry[0].DIRECTORY_SEPARATOR.$arry[1].DIRECTORY_SEPARATOR.$arry[2];
        }
        $path = _SITE_PATH.$className . '.php';
        if(file_exists($path))
        {
            require_once $path;
        }
    }


}
