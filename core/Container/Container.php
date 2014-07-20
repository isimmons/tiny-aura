<?php namespace TinyAura\Container;

use Aura\Di\Container as DiContainer;
use Aura\Di\Factory;
use Aura\Di\Forge;
use Aura\Di\Config as DiConfig;

class Container {

    protected $container;

    public function __construct()
    {
        $this->container = new DiContainer(new Forge(new DiConfig));
    }

    public function set($objectName, $object)
    {
        $this->container->set($objectName, $object);
    }

    public function get($object)
    {
        return $this->container->get($object);
    }

}