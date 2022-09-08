<?php

$base = 'http://localhost/arquivomorto';
global $db;
$db_name = "arquivomorto";
$db_host = "localhost";
$db_user = "root";
$db_pass = "";

try {
    $db = new PDO("mysql:dbname=" . $db_name . ";host=" . $db_host, $db_user, $db_pass);
} catch (Exception $e) {
    echo $e->getMessage();
}
