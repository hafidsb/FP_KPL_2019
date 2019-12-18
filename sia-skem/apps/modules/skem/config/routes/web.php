<?php

$router->add('/user/biro-kemahasiswaan/login', array(
    'namespace' => 'SiaSkem\Skem\Controllers\Web',
    'module' => 'skem',
    'controller' => 'user',
    'action' => 'loginBiroKemahasiswaan',
));

$router->add('/user/logout', array(
    'namespace' => 'SiaSkem\Skem\Controllers\Web',
    'module' => 'skem',
    'controller' => 'user',
    'action' => 'logout',
));

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

$router->add('/skem/guide', array(
    'namespace' => 'SiaSkem\Skem\Controllers\Web',
    'module' => 'skem',
    'controller' => 'skem',
    'action' => 'showGuide',
));

$router->addGet('/realisasi_skem', array(
    'namespace' => 'SiaSkem\Skem\Controllers\Web',
    'module' => 'skem',
    'controller' => 'realisasiSkem',
    'action' => 'index',
));

$router->add('/realisasi_skem/create', array(
    'namespace' => 'SiaSkem\Skem\Controllers\Web',
    'module' => 'skem',
    'controller' => 'realisasiSkem',
    'action' => 'create',
));

$router->add('/realisasi_skem/delete/{id}', array(
    'namespace' => 'SiaSkem\Skem\Controllers\Web',
    'module' => 'skem',
    'controller' => 'realisasiSkem',
    'action' => 'delete',
));

$router->add('/realisasi_skem/edit/{id}', array(
    'namespace' => 'SiaSkem\Skem\Controllers\Web',
    'module' => 'skem',
    'controller' => 'realisasiSkem',
    'action' => 'edit',
));

$router->add('/realisasi_skem/validasi/{id}', array(
    'namespace' => 'SiaSkem\Skem\Controllers\Web',
    'module' => 'skem',
    'controller' => 'realisasiSkem',
    'action' => 'validate',
    'params' => 1
));

$router->add('/realisasi_skem/semester', array(
    'namespace' => 'SiaSkem\Skem\Controllers\Web',
    'module' => 'skem',
    'controller' => 'realisasiSkem',
    'action' => 'bySemester',
));

$router->add('/rencana_skem', array(
    'namespace' => 'SiaSkem\Skem\Controllers\Web',
    'module' => 'skem',
    'controller' => 'rencanaSkem',
    'action' => 'index',
));

$router->add('/rencana_skem/create', array(
    'namespace' => 'SiaSkem\Skem\Controllers\Web',
    'module' => 'skem',
    'controller' => 'rencanaSkem',
    'action' => 'create',
));

$router->add('/rencana_skem/delete/{id}', array(
    'namespace' => 'SiaSkem\Skem\Controllers\Web',
    'module' => 'skem',
    'controller' => 'rencanaSkem',
    'action' => 'delete',
));