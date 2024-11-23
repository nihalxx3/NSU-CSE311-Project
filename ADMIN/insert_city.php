<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rems";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data and check if set
    $cityID = isset($_POST['cityID']) ? $_POST['cityID'] : '';
    $cityName = isset($_POST['cityName']) ? $_POST['cityName'] : '';
    $divisionID = isset($_POST['divisionID']) ? $_POST['divisionID'] : '';

    // Display error if any field is empty
    if (empty($cityID) || empty($cityName) || empty($divisionID)) {
        die("Please fill out all fields.");
    }

    // SQL insert
    $sql = "INSERT INTO city (CityID, CityName, DivisionID) VALUES ('$cityID', '$cityName', '$divisionID')";

    if (mysqli_query($conn, $sql)) {
        echo "City added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
