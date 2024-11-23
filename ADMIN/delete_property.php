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
    // Get the PropertyID from the form
    $propertyID = intval($_POST['propertyID']);  // Ensure it's an integer

    // SQL query to delete the property from the properties table based on PropertyID
    $sql = "DELETE FROM properties WHERE PropertyID = ?";

    // Use prepared statements for security
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $propertyID);  // 'i' for integer (PropertyID)
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo "Property with ID: $propertyID deleted successfully!";
            } else {
                echo "No property found with Property ID: $propertyID.";
            }
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close(); // Close the statement
    } else {
        echo "Error preparing the SQL statement.";
    }

    // Close the database connection
    $conn->close();
}
?>
