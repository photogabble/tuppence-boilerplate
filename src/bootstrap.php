<?php

use Laminas\HttpHandlerRunner\Emitter\EmitterInterface;
use Photogabble\Tuppence\App;
use App\Exceptions\Handler;
use App\Services\Database;
use App\Services\Console;
use App\Services\Plates;
use App\Services\Routes;

if (!defined('APP_ROOT')) define('APP_ROOT', realpath(__DIR__ . '/../'));

include APP_ROOT . '/vendor/autoload.php';

/** @var EmitterInterface|null $emitter set if in UnitTesting */
$app = new App($emitter ?? null);
try {
    $app->setExceptionHandler(new Handler($app));
} catch (Throwable $e) {
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