<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "user_registration";

$db = new mysqli($hostname, $username, $password, $dbname);
if(mysqli_connect_error()) {
    echo "Could not connect to the database: ".$db->error;
}

?>