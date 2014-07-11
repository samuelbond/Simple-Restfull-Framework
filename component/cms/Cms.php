<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 07/07/14
 * Time: 17:58
 */

namespace component\cms;


use application\AbstractEntityManager;
use application\BaseComponent;


class Cms extends BaseComponent{



    public function __construct()
    {
        // TODO: Implement __construct() method.
    }

    public function init()
    {
        // TODO: Implement init() method.
    }

    public function __toString()
    {
        return "cms";
    }


    public function getNewFile()
    {
        /**
        $entity = new abstractentitymanager();
        $em = $entity->createEntityManager();
      // $fileRepo = $em->getRepository("File");
        $files = $em->find("File", 1);

        foreach($files as $file)
        {

            echo $file->getFileName();
        }
         *
         */
        /**
        $entityMang = new abstractentitymanager();
        $entityMang = $entityMang->createEntityManager();
        $files = $entityMang->getRepository('model\cms\File')->getAllFiles();
        echo "<br /> File Name: ";
        foreach ($files as $file)
        echo $file->getFileName()."<br />";
        //echo "<pre>".var_dump($file)."</pre>";
        echo "<br />";
         *
         */
        var_dump(EntityManager::createEntityManager());
    }


    public function OldInsert()
    {
        $entityMang = new AbstractEntityManager();
        $entityMang = $entityMang->createEntityManager();
        $file = new \model\cms\File();
        $file->setDateCreated(new \DateTime("now"));
        $file->setDateModified(new \DateTime("now"));
        $file->setFileName("another file");
        $file->setFilePath("another_new_file.txt");
        $file->setFileSize(2334);
        $file->setOwner("bond");

        $entityMang->persist($file);
        $entityMang->flush();
        echo("I am done");
    }


} 