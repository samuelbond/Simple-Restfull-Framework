<?php

/**
 * @author Samuel
 * @copyright 2014
 */

namespace test;

use application\Router;
use service\indexService;

require_once dirname(basename(__DIR__)).DIRECTORY_SEPARATOR."bootstrap.php";

class RouterTest extends \PHPUnit_Framework_TestCase{

    public function testEmpty()
    {
        $stack = array();
        $this->assertEmpty($stack);

        return $stack;
    }

    public function testController()
    {
        $router = new Router(new \stdClass());
        $router->loadService("index", _SITE_PATH."service/");

        $this->assertTrue($router->clClass instanceof indexService, "Failed to create requested service");
    }

} 