<?php
/**
 * Created by PhpStorm.
 * User: s.amaziro
 * Date: 26/03/14
 * Time: 13:53
 */

namespace component\translator;


class translation {

    private $id;
    private $mainKey;
    private $translation;

    public function __construct()
    {
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $mainKey
     */
    public function setMainKey($mainKey)
    {
        $this->mainKey = trim($mainKey);
    }

    /**
     * @return mixed
     */
    public function getMainKey()
    {
        return $this->mainKey;
    }

    /**
     * @param mixed $translationl
     */
    public function setTranslation($translation)
    {
        $this->translation = $translation;
    }

    /**
     * @return mixed
     */
    public function getTranslation()
    {
        return $this->translation;
    }


} 