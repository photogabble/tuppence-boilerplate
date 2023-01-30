<?php

use App\Exceptions\Handler;
use App\Services\Console;
use App\Services\Database;
use App\Services\Plates;
use App\Services\Routes;
use Photogabble\Tuppence\App;
use Photogabble\Tuppence\ErrorHandlers\InvalidHandlerException;

define('APP_ROOT', realpath(__DIR__ . '/../'));

include APP_ROOT . '/vendor/autoload.php';

$app = new App();
try {
    $app->setExceptionHandler(new Handler($app));
} catch (InvalidHandlerException $e) {
    echo $e->getMessage();
    die();
}

//
// Config
//

$app->getContainer()->addShared('config', include __DIR__ . '/../config.php');

//
// Services
//

$app->register(new Routes());
$app->register(new Database());
$app->register(new Plates());
$app->register(new Console());

return $app;