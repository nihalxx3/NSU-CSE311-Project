<?php

$servername = "localhost"; // Usually "localhost" if the database is on the same server
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "rems"; // Replace with your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

?>