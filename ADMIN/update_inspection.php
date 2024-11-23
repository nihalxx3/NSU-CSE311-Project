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
    $inspectionDate = $_POST['inspectionDate']; // Ensure it's a valid date

    // Validate foreign key (PropertyID)
    $property_check_sql = "SELECT COUNT(*) FROM properties WHERE PropertyID = ?";
    $stmt_property = $conn->prepare($property_check_sql);
    $stmt_property->bind_param("i", $propertyID);
    $stmt_property->execute();
    $stmt_property->bind_result($property_exists);
    $stmt_property->fetch();
    $stmt_property->close();

    if (!$property_exists) {
        echo "Error: PropertyID $propertyID does not exist.";
    } else {
        // SQL query to update inspection details for the given PropertyID
        $sql = "UPDATE inspection 
                SET InspectionDate = ? 
                WHERE PropertyID = ?";

        // Use prepared statements for security
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $inspectionDate, $propertyID);

        // Execute the query
        if ($stmt->execute()) {
            echo "Inspection details updated successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close(); // Close the statement
    }

    $conn->close(); // Close the database connection
}
?>
