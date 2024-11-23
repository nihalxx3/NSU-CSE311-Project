<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rems";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $agentID = $_POST['agentID'];
    $phoneNumber = $_POST['phoneNumber'];

    $sql = "INSERT INTO agents_phonenumber (AgentID, PhoneNumber)
            VALUES ('$agentID', '$phoneNumber')";

    if (mysqli_query($conn, $sql)) {
        echo "Phone number added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
