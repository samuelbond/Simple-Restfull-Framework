<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 09/07/14
 * Time: 15:15
 */

namespace component\cms;


use application\AbstractEntityManager;
use application\BaseEntityManager;
use model\Db;

class EntityManager implements BaseEntityManager{

    private $em;
    private static $entityManagerInstance = null;

    public function reconfigure()
    {
        $em = new AbstractEntityManager();
        $mydb = new Db("pdo_mysql", "cms_db", "root", "root", "localhost");
        $em->setDbDriver($mydb->getDbDriver());
        $em->setDbName($mydb->getDbName());
        $em->setDbUser($mydb->getDbUsername());
        $em->setDbPassword($mydb->getDbPassword());
        $em->setDbHost($mydb->getHost());

        $em->setProxyNamespace("model\cms\proxy");
        $em->setProxyPath(_SITE_PATH."model".DIRECTORY_SEPARATOR."cms".DIRECTORY_SEPARATOR."proxy");
        $em->setEntityPath(_SITE_PATH."model".DIRECTORY_SEPARATOR."cms");
        return $em;
    }

    public static function createEntityManager()
    {
        if(!EntityManager::$entityManagerInstance)
        {
           self::$entityManagerInstance = self::reconfigure()->createEntityManager();
            return self::$entityManagerInstance;
        }

        return self::$entityManagerInstance;
    }


} 