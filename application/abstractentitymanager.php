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


use model\Db;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Configuration;

class abstractentitymanager {


    private   $dbName      = "mydb";
    private   $dbUser      = "root";
    private   $dbDriver    = "pdo_mysql";
    private   $dbPassword  = "root";
    private   $dbHost      = "localhost";
    private   $entityPath  = null;
    private   $proxyPath   = null;
  //protected  $entityNamespace = null;
    private   $proxyNamespace  = null;


    public  function __construct()
    {

    }

    public function createEntityManager()
    {
        return $this->newConfig();
    }



    public function newConfig()
    {
        $config = new \Doctrine\ORM\Configuration();

        // Proxy Configuration
        $config->setProxyDir($this->getProxyPath());
        $config->setProxyNamespace($this->getProxyNameSpace());
        $config->setAutoGenerateProxyClasses((APPLICATION_ENV == "development"));

        // Mapping Configuration
        //$driverImpl = new Doctrine\ORM\Mapping\Driver\XmlDriver(__DIR__."/config/mappings/xml");
        //$driverImpl = new Doctrine\ORM\Mapping\Driver\XmlDriver(__DIR__."/config/mappings/yml");
        $driverImpl = $config->newDefaultAnnotationDriver($this->getEntityPath());
        $config->setMetadataDriverImpl($driverImpl);

        // Caching Configuration
        if (APPLICATION_ENV == "development") {
            $cache = new \Doctrine\Common\Cache\ArrayCache();
        } else {
            $cache = new \Doctrine\Common\Cache\ApcCache();
        }
        $config->setMetadataCacheImpl($cache);
        $config->setQueryCacheImpl($cache);

        // obtaining the entity manager
        $evm = new \Doctrine\Common\EventManager();
        $entityManager = \Doctrine\ORM\EntityManager::create($this->getDbParam(), $config, $evm);

        // For generating entities From database
        //$entityManager->getConfiguration()->setMetadataDriverImpl(new \Doctrine\ORM\Mapping\Driver\DatabaseDriver(
        //   $entityManager->getConnection()->getSchemaManager()
       // ));
        //$cmf = new \Doctrine\ORM\Tools\DisconnectedClassMetadataFactory();
       // $cmf->setEntityManager($entityManager);

        return $entityManager;
    }


    public function getDbParam()
    {

        $dbParams = array(
            "driver"    => $this->dbDriver,
            "user"      => $this->dbUser,
            "password"  => $this->dbPassword,
            "dbname"    => $this->dbName,
             "host"     => $this->dbHost
        );

        return $dbParams;
    }

    public function getEntityPath()
    {
        if($this->entityPath)
        {
            return $this->entityPath;
        }

        return array(_SITE_PATH."model".DIRECTORY_SEPARATOR."usermanagement");
    }

    public function getProxyPath()
    {
        if($this->proxyPath)
        {
            return $this->proxyPath;
        }

        return array(_SITE_PATH."model".DIRECTORY_SEPARATOR."usermanagement".DIRECTORY_SEPARATOR."proxy");
    }


    public function getProxyNameSpace()
    {
        if($this->proxyNamespace)
        {
            return $this->proxyNamespace;
        }

        return 'model\usermanagement\proxy';
    }

    /**
     * @param string $dbDriver
     */
    public function setDbDriver($dbDriver)
    {
        $this->dbDriver = $dbDriver;
    }

    /**
     * @return string
     */
    public function getDbDriver()
    {
        return $this->dbDriver;
    }

    /**
     * @param string $dbHost
     */
    public function setDbHost($dbHost)
    {
        $this->dbHost = $dbHost;
    }

    /**
     * @return string
     */
    public function getDbHost()
    {
        return $this->dbHost;
    }

    /**
     * @param string $dbName
     */
    public function setDbName($dbName)
    {
        $this->dbName = $dbName;
    }

    /**
     * @return string
     */
    public function getDbName()
    {
        return $this->dbName;
    }

    /**
     * @param string $dbPassword
     */
    public function setDbPassword($dbPassword)
    {
        $this->dbPassword = $dbPassword;
    }

    /**
     * @return string
     */
    public function getDbPassword()
    {
        return $this->dbPassword;
    }

    /**
     * @param string $dbUser
     */
    public function setDbUser($dbUser)
    {
        $this->dbUser = $dbUser;
    }

    /**
     * @return string
     */
    public function getDbUser()
    {
        return $this->dbUser;
    }

    /**
     * @param null $proxyNamespace
     */
    public function setProxyNamespace($proxyNamespace)
    {
        $this->proxyNamespace = $proxyNamespace;
    }

    /**
     * @param null $entityPath
     */
    public function setEntityPath($entityPath)
    {
        $this->entityPath = $entityPath;
    }

    /**
     * @param null $proxyPath
     */
    public function setProxyPath($proxyPath)
    {
        $this->proxyPath = $proxyPath;
    }





} 