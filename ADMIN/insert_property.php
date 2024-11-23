<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rems";

// Create a database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form inputs and sanitize them
    $propertyID = intval($_POST['propertyID']); // Ensure it's an integer
    $propertyType = mysqli_real_escape_string($conn, $_POST['propertyType']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $cityID = intval($_POST['cityID']); // Ensure it's an integer
    $userID = intval($_POST['userID']); // Ensure it's an integer
    $builderID = intval($_POST['builderID']); // Ensure it's an integer
    $agentID = intval($_POST['agentID']); // Ensure it's an integer

    // SQL query to insert data
    $sql = "INSERT INTO properties (PropertyID, PropertyType, Location, CityID, UserID, BuilderID, AgentID)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Use prepared statements for security
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issiiii", $propertyID, $propertyType, $location, $cityID, $userID, $builderID, $agentID);

    // Execute the query
    if ($stmt->execute()) {
        echo "Property details added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close(); // Close the statement
    $conn->close(); // Close the database connection
}
?>
