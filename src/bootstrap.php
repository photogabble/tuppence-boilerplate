<?php

define('APP_ROOT', realpath(__DIR__ . '/../'));

include APP_ROOT . '/vendor/autoload.php';

$app = new \Photogabble\Tuppence\App();

//
// Config
//

$app->getContainer()->share('config', include __DIR__ . '/../config.php');

//
// Services
//

$app->register(new \App\Services\Routes());
$app->register(new \App\Services\Database());
$app->register(new \App\Services\Plates());
$app->register(new \App\Services\Console());

return $app;