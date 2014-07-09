<?php
/**
 * Created by PhpStorm.
 * User: s.amaziro
 * Date: 26/03/14
 * Time: 13:35
 */

namespace translator;


use application\basecomponent;
include 'mymodel.php';
include_once 'translator.php';
class translator extends basecomponent{

    private $model;
    private $translation;

    public function __construct()
    {
        $this->translation = array();
        $this->model = new mymodel();
    }


    public function init()
    {
        $this->getAllTranslations();
    }

    public function getAllTranslations()
    {
        $allTrans = $this->model->fetchAllTranslations();

        foreach($allTrans as $num => $obj)
        {
                $this->translation = array_merge($this->translation, [$obj->getMainKey() => $obj->getTranslation()]);

        }
    }


    public function translate($whatToTranslate, $do = false)
    {
        if($do)
        {
            if(isset($this->translation[trim($whatToTranslate)]))
            {
                return $this->translation[trim($whatToTranslate)];
            }
        }
        return $whatToTranslate;
    }


    public  function __toString()
    {
        return "translator";
    }

} 