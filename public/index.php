<?php

use App\Handler\HomePageHandler;
use Pimple\Container;
use Pimple\Psr11\Container as Psr11Container;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$config = [
    'settings' => [
        'default_name' => 'Rob',
    ],
    HomePageHandler::class => function ($c) {
        return new HomePageHandler($c['settings']['default_name']);
    },
];
$container = new Container($config);
$app = AppFactory::create(null, new Psr11Container($container));

$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

$app->get('/', HomePageHandler::class);
$app->run();
