<?php
if (!file_exists(__DIR__ . '/app/config.php')) {
    exit("Config file does not exist. Please create it from app/config.php.dist." . PHP_EOL);
}

require __DIR__ . '/app/config.php';
require __DIR__ . '/vendor/autoload.php';

$pdo = new PDO(
    'mysql:host='.$dbConfig["db_host"].';dbname='. $dbConfig["db_name"],
    $dbConfig["db_user"],
    $dbConfig["db_password"]
);

$builder = new DI\ContainerBuilder();
$builder->addDefinitions([
    \App\Service\Repository::class => DI\Create()->constructor($pdo),
]);

$container = $builder->build();
global $container; // todo