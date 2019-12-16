<?php

$router->addGet('/skem', array(
    'namespace' => 'SiaSkem\Skem\Controllers\Web',
    'module' => 'skem',
    'controller' => 'skem',
    'action' => 'index',
));

$router->add('/skem/create', array(
    'namespace' => 'SiaSkem\Skem\Controllers\Web',
    'module' => 'skem',
    'controller' => 'skem',
    'action' => 'create',
));

$router->add('/skem/poin', array(
    'namespace' => 'SiaSkem\Skem\Controllers\Web',
    'module' => 'skem',
    'controller' => 'skem',
    'action' => 'updatePoin',
));