<?php

$fixtures = [];

for ($i = 1; $i < 10; $i++) {
    $fixtures["users"][] = [
        "id" => $i,
        "name" => "user".$i
    ];
    $fixtures["advertisements"][] = [
        "id" => $i,
        "userid" => $i,
        "title" => "advertisement".$i
    ];
}
