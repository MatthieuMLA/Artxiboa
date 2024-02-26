<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Env</title>
    </head>

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