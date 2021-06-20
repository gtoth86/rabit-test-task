<?php
$pdo = new PDO(
    'mysql:host='.$dbConfig["db_host"],
    $dbConfig["db_user"],
    $dbConfig["db_password"]
);

$pdo->exec("CREATE DATABASE " . $dbConfig["db_name"]);

$pdo = new PDO(
    'mysql:host='.$dbConfig["db_host"].';dbname='. $dbConfig["db_name"],
    $dbConfig["db_user"],
    $dbConfig["db_password"]
);

$pdo->exec("CREATE TABLE users (
                        id INT AUTO_INCREMENT NOT NULL, 
                        name VARCHAR(255) NOT NULL,
                        PRIMARY KEY (id)
                      ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
");

$pdo->exec("CREATE TABLE advertisements (
                        id INT AUTO_INCREMENT NOT NULL, 
                        userid INT NOT NULL,
                        title VARCHAR(255) NOT NULL,
                        PRIMARY KEY (id),
                        FOREIGN KEY (userid) REFERENCES users(id)
                      ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
");

require __DIR__ . "/fixtures.php";

$userValues = array_map(function ($userData) {
    return sprintf("(%d, '%s')", $userData["id"], $userData["name"]);
}, $fixtures["users"]);

$pdo->exec(sprintf("INSERT INTO users (id, name) VALUES %s", implode(", ", $userValues)));

$advertisementValues = array_map(function ($advertisementData) {
    return sprintf("(%d, %d, '%s')", $advertisementData["id"], $advertisementData["userid"], $advertisementData["title"]);
}, $fixtures["advertisements"]);

$pdo->exec(sprintf("INSERT INTO advertisements (id, userid, title) VALUES %s", implode(", ", $advertisementValues)));
