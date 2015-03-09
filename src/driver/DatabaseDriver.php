<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 26/02/15
 * Time: 10:50
 */

namespace driver;


use application\Driver;
use Doctrine\ORM\EntityManager;
use model\Database;
use model\DatabaseConfiguration;
use model\DatabaseFactory;

class DatabaseDriver extends Driver{

    private $driver = "doctrine";

    /**
     * @return mixed |\mysqli|\PDO|EntityManager
     */
    public function loadDriver()
    {
        $dbConfig = new DatabaseConfiguration();

        if($this->driver === "doctrine")
        {
            return $this->doctrine($dbConfig);
        }
        elseif($this->driver === "PDO")
        {
            $db = new Database("PDO", $dbConfig->getDbName(), $dbConfig->getDbPassword(), $dbConfig->getDbUsername(), $dbConfig->getHost(), $dbConfig->getPort());
            return DatabaseFactory::createDatabase($db);
        }
        else
        {
            $db = new Database("MYSQLI", $dbConfig->getDbName(), $dbConfig->getDbPassword(), $dbConfig->getDbUsername(), $dbConfig->getHost(), $dbConfig->getPort());
            return DatabaseFactory::createDatabase($db);
        }

    }


    public function doctrine(DatabaseConfiguration $dbConfig, $proxyPath = null, $proxyNameSpace = null, $entityPath = null, $entityNameSpace = null )
    {

        $nullChecker = function($variable, $default){ return (is_null($variable) ? $default : $variable);};

        $entityNameSpace = $nullChecker($entityNameSpace, "model\\entities\\");
        $entityPath = $nullChecker($entityPath, array(_SITE_PATH."model".DIRECTORY_SEPARATOR."entities"));
        $proxyNameSpace = $nullChecker($proxyNameSpace, "model\\entities\\proxy");
        $proxyPath = $nullChecker($proxyPath, _SITE_PATH."model".DIRECTORY_SEPARATOR."entities".DIRECTORY_SEPARATOR."proxy");

        $params = array(
            "driver"    => "pdo_mysql",
            "user"      => $dbConfig->getDbUsername(),
            "password"  => $dbConfig->getDbPassword(),
            "dbname"    => $dbConfig->getDbName(),
            "host"      => $dbConfig->getHost()
        );

        $config = new \Doctrine\ORM\Configuration();

        // Proxy Configuration
        $config->setProxyDir($proxyPath);
        $config->setProxyNamespace($proxyNameSpace);
        $config->setAutoGenerateProxyClasses((APPLICATION_ENV == "development"));
        //$config->setAutoGenerateProxyClasses(false);

        // Mapping Configuration
        //$driverImpl = new Doctrine\ORM\Mapping\Driver\XmlDriver(__DIR__."/config/mappings/xml");
        //$driverImpl = new Doctrine\ORM\Mapping\Driver\XmlDriver(__DIR__."/config/mappings/yml");
        $driverImpl = $config->newDefaultAnnotationDriver($entityPath);
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
        $entityManager = \Doctrine\ORM\EntityManager::create($params, $config, $evm);

        // For generating entities From database
        $driverDb = new \Doctrine\ORM\Mapping\Driver\DatabaseDriver(
            $entityManager->getConnection()->getSchemaManager()
        );
        $driverDb->setNamespace($entityNameSpace);
        $entityManager->getConfiguration()->setMetadataDriverImpl($driverDb);
        $cmf = new \Doctrine\ORM\Tools\DisconnectedClassMetadataFactory();
        $cmf->setEntityManager($entityManager);

        return $entityManager;
    }




} 