<?php namespace TinyAura;

use TinyAura\Exceptions\ErrorHandler;
use TinyAura\Config\Config;
use Aura\Di\Container;
use Aura\Di\Factory;
use Aura\Di\Forge;
use Aura\Di\Config as DiConfig;

class TinyAura {
    
    public static $app;

    protected $container;

    public function __construct()
    {
        $this->container = new Container(new Forge(new DiConfig));
    }

    public function run()
    {
        $this->loadErrorHandler();
        $this->loadConfig();
    }

    private function loadErrorHandler()
    {
        $errorHandler = new ErrorHandler;
        $errorHandler->load();
    }

    private function loadConfig()
    {
        $configLoader = new Config;
        $configs = $configLoader->loadAll();
        
        $configs = $this->arrayToObject($configs);
        
        $this->storeConfig($configs);
        
    }

    protected function storeConfig($configs)
    {
        $this->container->set('config', $configs);        
    }


    public static function getInstance()
    {
        if( !( self::$app instanceof self))
        {
            self::$app = new self;
        }

        return self::$app;
    }

    public function getConfig($configFile, $value)
    {
        return $this->container->get('config')->$configFile->$value;
    }

    protected function arrayToObject($d) {
        if (is_array($d)) {
            return (object) array_map(__METHOD__, $d);
        }
        else {
            // Return object
            return $d;
        }
    }
}