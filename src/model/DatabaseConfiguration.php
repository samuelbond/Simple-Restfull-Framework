<?php
/**
 *
 * Simple Restful Framework
 * @version 1.0
 *
 * Created By Samuel Izuchi Amaziro
 * Copyright 2014 Plati Tech Limited, All Rights Reserved
 */

namespace model;


class DatabaseConfiguration {

    private $host;
    private $port;
    private $dbUsername;
    private $dbPassword;
    private $dbName;
    private $charSet;

    private $env = array(
        "local" => array(
            "host"          => "localhost",
            "port"          =>  "3307",
            "username"      => "root",
            "password"      => "",
            "database"      => "my_database_name",
            "charset"       => "latin1",
        ),

    );


    public function __construct()
    {
        $config = $this->getSelectEnvironmentConfig();
        $this->dbName = $config['database'];
        $this->host = $config['host'];
        $this->port = $config['port'];
        $this->dbUsername = $config['username'];
        $this->dbPassword = $config['password'];
        $this->charSet = $config['charset'];
    }


    /**
     * @return mixed
     */
    public function getSelectEnvironmentConfig()
    {

        $config = $this->env['local'];

        return $config;

    }



    /**
     * @return mixed
     */
    public function getCharSet()
    {
        return $this->charSet;
    }

    /**
     * @return mixed
     */
    public function getDbUsername()
    {
        return $this->dbUsername;
    }

    /**
     * @return mixed
     */
    public function getDbName()
    {
        return $this->dbName;
    }

    /**
     * @return mixed
     */
    public function getDbPassword()
    {
        return $this->dbPassword;
    }

    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @return mixed
     */
    public function getPort()
    {
        return $this->port;
    }



} 