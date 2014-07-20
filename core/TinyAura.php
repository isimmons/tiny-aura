<?php namespace TinyAura;

use TinyAura\Exceptions\ErrorHandler;
use TinyAura\Config\Config;
use TinyAura\Container\Container;
use TinyAura\Router\Route;

class TinyAura {

    public static $app;

    protected $container;

    public function __construct()
    {
        $this->container = new Container;
    }

    public function run()
    {
        $this->loadErrorHandler();
        $this->loadHelpers();
        $this->loadConfig();
        $this->loadRoutes();
    }

    private function loadErrorHandler()
    {
        $errorHandler = new ErrorHandler;
        $errorHandler->load();
    }

    private function loadHelpers()
    {
        require __DIR__.'/Support/helpers.php';
    }

    private function loadConfig()
    {
        $configLoader = new Config;
        $configs = $configLoader->loadAll();
        
        $configs = arrayToObject($configs);

        $this->container->set('config', $configs);
    }

    private function loadRoutes()
    {
        $router = new Route;
        $routes = $router->loadRoutes();

        $routes = arrayToObject($routes);
        
        $this->container->set('routes', $routes);
    }

    /**
    * Binds an object in the DI container
    *
    * @param string $name
    * @param object $object
    * @return mixed
    */
    public function bind($name, $object)
    {
        return $this->container->set($name, $object);
    }

    /**
    * Resolves an object out of the DI container
    *
    * @param string $name
    * @return mixed
    */
    public function make($name)
    {
        return $this->container->get($name);
    }

    /**
    * Get an instance of the app
    *
    * @return TinyAura
    */
    public static function getInstance()
    {
        if( !( self::$app instanceof self))
        {
            self::$app = new self;
        }

        return self::$app;
    }

}