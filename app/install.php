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
