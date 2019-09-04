<?php declare(strict_types=1);

use App\Handler\HomePageHandler;
use Pimple\Container;

return function (Container $container) {
    $container[HomePageHandler::class] = static function ($c) {
        return new HomePageHandler($c['settings']['default_name']);
    };
};