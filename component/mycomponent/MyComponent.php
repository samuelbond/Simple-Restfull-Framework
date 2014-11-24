<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 11/07/14
 * Time: 09:35
 */

namespace component\mycomponent;


use application\BaseComponent;

class MyComponent extends BaseComponent{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Loads a component based on current version
     * @return $this
     */
    public function loadComponent()
    {
        return $this->selectVersion($this->getCurrentVersion());
    }

    /**
     * Gets the current version of the component
     * @return string
     */
    public function getCurrentVersion()
    {
        return $this->currentVersion;
    }

    /**
     * Returns an array of available versions for a component
     * @return array
     */
    public function getAvailableVersions()
    {
        return array($this->getCurrentVersion());
    }

    /**
     * Selects the given version of this component
     *
     * @param $version
     * @return $this
     */
    private function selectVersion($version)
    {
        switch($version)
        {
            case "1.0":
            default:
                return $this;
        }
    }

} 