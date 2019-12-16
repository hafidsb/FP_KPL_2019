<?php

use Phalcon\Mvc\View;
use Phalcon\Flash\Direct as FlashDirect;
use Phalcon\Flash\Session as FlashSession;

$di['voltServiceMail'] = function($view) use ($di) {

    $config = $di->get('config');

    $volt = new \Phalcon\Mvc\View\Engine\Volt($view, $di);
    if (!is_dir($config->mail->cacheDir)) {
        mkdir($config->mail->cacheDir);
    }

    $compileAlways = $config->mode == 'DEVELOPMENT' ? true : false;

    $volt->setOptions(array(
        "compiledPath" => $config->mail->cacheDir,
        "compiledExtension" => ".compiled",
        "compileAlways" => $compileAlways
    ));
    return $volt;
};

$di['view'] = function () {
    $view = new View();
    $view->setViewsDir(__DIR__ . '/../views/');

    $view->registerEngines(
        [
            ".volt" => "voltService",
        ]
    );

    return $view;
};

$di->set(
    'flash',
    function () {
        $flash = new FlashDirect(
            [
                'error'   => 'alert alert-danger',
                'success' => 'alert alert-success',
                'notice'  => 'alert alert-info',
                'warning' => 'alert alert-warning',
            ]
        );

        return $flash;
    }
);

$di->set(
    'flashSession',
    function () {
        $flash = new FlashSession(
            [
                'error'   => 'alert alert-danger',
                'success' => 'alert alert-success',
                'notice'  => 'alert alert-info',
                'warning' => 'alert alert-warning',
            ]
        );

        $flash->setAutoescape(false);
        
        return $flash;
    }
);


$di['db'] = function () use ($di) {

    $config = $di->get('config');

    $dbAdapter = $config->database->adapter;

    return new $dbAdapter([
        "host" => $config->database->host,
        "username" => $config->database->username,
        "password" => $config->database->password,
        "dbname" => $config->database->dbname
    ]);
};