<?php
/**
 *
 * Simple MVC Framework aka Baseframework
 * @version 2.0
 *
 * Created By Samuel Izuchi Amaziro
 * Copyright 2014 Plati Tech Limited, All Rights Reserved
 */

namespace application;


use exceptions\InvalidPathException;
use exceptions\TemplateException;

class Template {

    private $registry;
    private $variables = array();
    private $path;

    public function __construct($registry)
    {
        $this->registry = $registry;
    }


    public function setViewPath($path)
    {
        try
        {
        if(!(is_dir($path)))
        {
            throw new InvalidPathException("Invalid Path Exception Invalid View Path provided: ");
        }
        $this->path = $path;
        }catch (\Exception $ex)
        {
            echo $ex->getMessage();
            die();
        }
    }


    public function __set($name, $value)
    {
        $this->variables[$name] = $value;
    }

    public function loadView($viewname, $useHeaderAndFooter = false)
    {
        $viewfile = $this->path.$viewname.".php";

        try
        {
            if(!file_exists($viewfile))
            {
                throw new TemplateException("Template view not found!");
                return false;
            }

            foreach($this->variables as $nameOfVariable => $valueOfVariable)
            {
                $$nameOfVariable = $valueOfVariable;
            }

            if($useHeaderAndFooter) include $this->registry->header;

            include $viewfile;

           if($useHeaderAndFooter) include $this->registry->footer;

        }catch (\Exception $ex)
        {
           echo $ex->getMessage();
        }
    }

}