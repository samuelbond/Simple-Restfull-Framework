<?php
/**
 *
 * Simple Restful Framework
 * @version 1.0
 *
 * Created By Samuel Izuchi Amaziro
 * Copyright 2014 Plati Tech Limited, All Rights Reserved
 */

namespace component;


use application\AbstractEntityManager;
use application\BaseEntityManager;

class EntityManager implements BaseEntityManager{

    /**
     * @var null|\Doctrine\ORM\EntityManager
     */
    private static $entityManagerInstance = null;

    public function reconfigure()
    {
        $em = new AbstractEntityManager();
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

    public static function closeEntityManager()
    {
        $em = self::$entityManagerInstance;

        if($em !== null)
        {
            $em->close();
            self::$entityManagerInstance = null;
        }
    }
} 