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
    $dbname = "tai_bear";
    $user = "tai_bear";
    $pwd = "FSS4QVXJCQ";
}

?>