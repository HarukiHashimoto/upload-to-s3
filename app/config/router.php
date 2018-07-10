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
