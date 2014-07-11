<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 10/07/14
 * Time: 16:55
 */

namespace controller;


use application\BaseController;

class newuserController extends BaseController{


    public function index()
    {
      if(isset($_POST['fname']))
      {

      }

        $this->registry->template->loadview("adduser");
    }


} 