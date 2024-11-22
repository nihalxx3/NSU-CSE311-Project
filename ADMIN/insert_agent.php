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
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $propertyID = $_POST['propertyID'] ?: NULL;
    $userID = $_POST['userID'] ?: NULL;

    $sql = "INSERT INTO agents (AgentID, FName, LName, PropertyID, UserID)
            VALUES ('$agentID', '$fName', '$lName', " . ($propertyID ? "'$propertyID'" : "NULL") . ", " . ($userID ? "'$userID'" : "NULL") . ")";

    if (mysqli_query($conn, $sql)) {
        echo "Agent added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
