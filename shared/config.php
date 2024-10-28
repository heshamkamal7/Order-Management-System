<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "taskround30";

try {
    $connect = mysqli_connect($host, $user, $password, $dbname);
} catch (Exception $e) {
    echo $e->getMessage();
}
