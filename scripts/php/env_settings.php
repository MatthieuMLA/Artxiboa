<?php

// if we are in the local environment
/*
$host = "localhost";
$dbname = "tai";
$user = "root";
$pwd = "";*/

$host = "localhost";
$dbname = "artxiboa";
$user = "root";
$pwd = "";

// si on est sur le server
if (file_exists("/var/www/")) {
    $host = "localhost";
    $dbname = "the-db-name";
    $user = "the-user";
    $pwd = "the-password";
}

?>