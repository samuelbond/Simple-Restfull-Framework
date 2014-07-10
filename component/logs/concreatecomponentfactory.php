<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 07/07/14
 * Time: 17:48
 */

namespace component\logs;


use application\abstractcomponentfactory;

class concreatecomponentfactory extends  abstractcomponentfactory{

    public function createComponent()
    {
        $logs = new logs(null, null);
        $logs->init();

        return $logs;
    }

} 