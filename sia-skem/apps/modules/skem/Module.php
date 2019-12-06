<?php

namespace SiaSkem\Skem;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces([
            'SiaSkem\Skem\Domain\Model' => __DIR__ . '/domain/model',
            'SiaSkem\Skem\Infrastructure' => __DIR__ . '/infrastructure',
            'SiaSkem\Skem\Application' => __DIR__ . '/application',
            'SiaSkem\Skem\Controllers\Web' => __DIR__ . '/controllers/web',
            'SiaSkem\Skem\Controllers\Api' => __DIR__ . '/controllers/api',
            'SiaSkem\Skem\Controllers\Validators' => __DIR__ . '/controllers/validators',
        ]);

        $loader->register();
    }

    public function registerServices(DiInterface $di = null)
    {
        $moduleConfig = require __DIR__ . '/config/config.php';

        $di->get('config')->merge($moduleConfig);

        include_once __DIR__ . '/config/services.php';
    }

}