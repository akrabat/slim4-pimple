<?php

use Pimple\Container;
use Pimple\Psr11\Container as Psr11Container;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

// Read settings and create Pimple container
$settings = require __DIR__ . '/../src/settings.php';
$container = new Container(['settings' => $settings]);

// Create App
$app = AppFactory::create(null, new Psr11Container($container));

// Set up dependencies
$dependencies = require __DIR__ . '/../src/dependencies.php';
$dependencies($container);

// Register middleware
$middleware = require __DIR__ . '/../src/middleware.php';
$middleware($app);

// Register routes
$routes = require __DIR__ . '/../src/routes.php';
$routes($app);

$app->run();
