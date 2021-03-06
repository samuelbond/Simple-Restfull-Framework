<?php
/**
 *
 * Simple Restful Framework
 * @version 1.0
 *
 * Created By Samuel Izuchi Amaziro
 * Copyright 2014 Plati Tech Limited, All Rights Reserved
 */

require_once "bootstrap.php";
$entity = new \driver\DatabaseDriver();

$entityManager = $entity->loadDriver();


$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($entityManager->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($entityManager)));

return $helperSet;
//return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);