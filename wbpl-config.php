<?php

$host = 'localhost';
$username = 'root';
$password = '';
$db_name = 'wbpl_ml';

$mysqli = new mysqli($host, $username, $password);

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

/* change db to world db */
$mysqli->select_db($db_name);
