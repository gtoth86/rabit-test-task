<?php
if (!file_exists(__DIR__ . '/app/config.php')) {
    exit("Config file does not exist. Please create it from app/config.php.dist." . PHP_EOL);
}

require __DIR__ . '/app/config.php';
require __DIR__ . '/vendor/autoload.php';

$builder = new DI\ContainerBuilder();
$container = $builder->build();
