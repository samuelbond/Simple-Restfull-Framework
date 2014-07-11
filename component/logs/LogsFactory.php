<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 07/07/14
 * Time: 17:48
 */

namespace component\logs;


use application\AbstractComponentFactory;

class LogsFactory extends  AbstractComponentFactory{

    public function createComponent()
    {
        $logs = new Logs(null, null);
        $logs->init();

        return $logs;
    }

} 