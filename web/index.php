<?php
require __DIR__ . '/../bootstrap.php';

$router = $container->get(\App\Service\Router::class);

try {
    $router->handle($_GET);
} catch (Exception $e) {
    echo $e->getMessage();
}
