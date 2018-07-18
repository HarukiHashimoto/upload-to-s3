<?php

$router = $di->getRouter();

// Define your routes here

$router->handle();

$router->add(
    '/phpinfo',
    [
        'controller' => 'info',
        'action' => 'info'
    ]
);

$router->add(
    '/',
    [
        'controller' => 'gallery',
        'action' => ''
    ]
);

$router->addGet(
    '/api/viewAll',
    [
        'controller' => 'gallery',
        'action' => 'viewAll'
    ]
);

$router->add(
    '/api/upload',
    [
        'controller' => 'gallery',
        'action' => 'upload'
    ]
);
