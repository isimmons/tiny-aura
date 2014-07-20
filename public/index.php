<?php

require __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/start.php';


$app->run();

// var_dump($app->getConfig('app', 'foo'));
