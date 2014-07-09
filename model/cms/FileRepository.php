<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 09/07/14
 * Time: 14:56
 */

namespace model\cms;


class FileRepository extends \Doctrine\ORM\EntityRepository{

    public function getAllFiles()
    {
        return $this->_em->createQuery('SELECT f FROM model\cms\File f')->getResult();
    }

} 