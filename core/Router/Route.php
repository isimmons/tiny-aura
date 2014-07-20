<?php namespace TinyAura\Router;

use Aura\Router\Map;
use Aura\Router\DefinitionFactory;
use Aura\Router\RouteFactory;

class Route {
    
    protected $router;

    public function __construct()
    {
        $this->router = new Map(new DefinitionFactory, new RouteFactory);
    }

    public function loadRoutes()
    {
        return require __DIR__.'/../../app/routes.php';
    }

}