<?php namespace TinyAura;

use TinyAura\Exceptions\ErrorHandler;
use TinyAura\Config\Config;

class TinyAura {
    
    public function __construct()
    {
        //
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
        $config->load();
    }
}