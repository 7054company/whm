<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 5.6
 * @ Decoder version: 1.0.4
 * @ Release: 02/06/2020
 *
 * @ ZendGuard Decoder PHP 5.6
 */

namespace WHMCS\Session\Database;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $sessionConfig = $this->app->make("config")->session_handling;
        $databaseConfig = array();
        if (isset($sessionConfig["database"]) && is_array($sessionConfig["database"])) {
            $databaseConfig = $sessionConfig["database"];
        }
        $config = $this->factoryConfiguration($databaseConfig);
        $handler = $this->factoryHandler($config);
        $this->setSaveHandler($handler);
    }
    protected function setSessionSerialization()
    {
        ini_set("session.serialize_handler", "php_serialize");
    }
    protected function setSaveHandler($handler)
    {
        $this->setSessionSerialization();
        if (!session_set_save_handler($handler, true)) {
            throw new \WHMCS\Exception\Session\Database\DatabaseSessionException("Failed to create database session");
        }
    }
    public function factoryConfiguration(array $databaseConfig = array())
    {
        return new Configuration($databaseConfig, \WHMCS\Database\Capsule::getInstance());
    }
    public function factoryHandler(Configuration $configuration)
    {
        $handler = new SessionHandler($configuration);
        return $handler;
    }
}

?>