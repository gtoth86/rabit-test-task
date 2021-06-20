<?php
require __DIR__ . '/../bootstrap.php';

$router = $container->get(\App\Service\Router::class);

$router->handle($_GET);
