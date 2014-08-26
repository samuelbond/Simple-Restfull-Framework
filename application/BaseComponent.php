<?php
/**
 *
 * Simple MVC Framework aka Baseframework
 * @version 2.0
 *
 * Created By Samuel Izuchi Amaziro
 * Copyright 2014 Plati Tech Limited, All Rights Reserved
 */

namespace application;


Abstract class BaseComponent {

    protected  $registry;
    protected  $currentVersion = "1.0";

    public function __construct($registry)
    {
        $this->registry = $registry;
    }

    /**
     * Loads a component based on current version
     * @return mixed
     */
    abstract public function loadComponent();

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

    public function setCurrentVersion($version)
    {
        if(in_array($version, $this->getAvailableVersions()))
        {
            $this->currentVersion = $version;
        }
    }
}