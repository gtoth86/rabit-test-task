<?php
if (!file_exists(__DIR__ . '/app/config.php')) {
    exit("Config file does not exist. Please create it from app/config.php.dist." . PHP_EOL);
}

require __DIR__ . '/app/config.php';
require __DIR__ . '/vendor/autoload.php';

$dbExist = true;

try {
    $pdo = new PDO(
        'mysql:host='.$dbConfig["db_host"].';dbname='. $dbConfig["db_name"],
        $dbConfig["db_user"],
        $dbConfig["db_password"]
    );
} catch (PDOException $e) {
    if ($e->errorInfo[1] === 1049) {
        $dbExist = false;
    }
}

if (!$dbExist) {
    echo 'Installing...';

    require __DIR__ . '/app/install.php';

    header('Location: index.php?controller=index&action=index');
    exit;
}

$builder = new DI\ContainerBuilder();
$builder->addDefinitions([
    \App\Service\Repository::class => DI\Create()->constructor($pdo),
]);

$container = $builder->build();
global $container; // todo
