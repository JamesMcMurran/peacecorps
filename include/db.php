<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "peaceCorps";


$mysqli = new mysqli($servername, $username, $password, $dbname);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


?>