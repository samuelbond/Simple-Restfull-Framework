<?php
/**
 *
 * Simple MVC Framework aka Baseframework
 * @version 2.0
 *
 * Created By Samuel Izuchi Amaziro
 * Copyright 2014 Plati Tech Limited, All Rights Reserved
 */

namespace component\usermanagement;


use application\AbstractEntityManager;
use application\BaseEntityManager;
use model\Db;

class EntityManager implements BaseEntityManager{

    private static $entityManagerInstance = null;

    public function reconfigure()
    {
        $em = new AbstractEntityManager();
        //Configure Namespace
        $em->setProxyNamespace("model\usermanagement\proxy");
        $em->setProxyPath(_SITE_PATH."model".DIRECTORY_SEPARATOR."usermanagement".DIRECTORY_SEPARATOR."proxy");
        $em->setEntityPath(_SITE_PATH."model".DIRECTORY_SEPARATOR."usermanagement");
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