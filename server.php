<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$uri = urldecode($uri);

$publicPath = __DIR__.'/public'; 

$requested = $publicPath.'/'.$uri;

if ($uri !== '/' and file_exists($requested))
{
    return false;
}

require_once $publicPath.'/index.php';
