<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 11/07/14
 * Time: 09:38
 */

namespace component\mycomponent;


use application\AbstractComponentFactory;

class MyComponentFactory extends AbstractComponentFactory{

    public function createComponent()
    {
        return new MyComponent();
    }


} 