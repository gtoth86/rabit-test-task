<?php
if (!file_exists(__DIR__ . '/app/config.php')) {
    exit("Config file does not exist. Please create it from app/config.php.dist.");
}

require __DIR__ . '/app/config.php';
require __DIR__ . '/vendor/autoload.php';
