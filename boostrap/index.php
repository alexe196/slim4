<?php
session_start();
error_reporting(E_ALL & ~E_DEPRECATED);

use DI\Container;
use Slim\Factory\AppFactory;
require __DIR__ . '/../vendor/autoload.php';

$container = new Container();


$container->set('app', function () {
    return AppFactory::create();
});

$settings = require __DIR__ . '/../app/settings.php';


$settings($container);

AppFactory::setContainer($container);
$app = AppFactory::create();

$containers = $app->getContainer();
$capsule = new Illuminate\Database\Capsule\Manager;
$capsule->addConnection($containers->get('settings')['db']);
$capsule->bootEloquent();



$middlewares = require __DIR__ . '/../app/Middleware/middlewares.php';
$middlewares($app);

$routes = require __DIR__ . '/../route/web.php';
$routes($app);

$app->run();
