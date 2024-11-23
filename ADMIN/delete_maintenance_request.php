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
    // Get the inputs and sanitize them
    $propertyID = intval($_POST['propertyID']); // Ensure it's an integer
    $userID = intval($_POST['userID']); // Ensure it's an integer

    // Validate if the combination of PropertyID and UserID exists
    $check_sql = "SELECT COUNT(*) FROM maintenance_requests WHERE PropertyID = ? AND UserID = ?";
    $stmt_check = $conn->prepare($check_sql);
    $stmt_check->bind_param("ii", $propertyID, $userID);
    $stmt_check->execute();
    $stmt_check->bind_result($exists);
    $stmt_check->fetch();
    $stmt_check->close();

    if (!$exists) {
        echo "Error: No maintenance request found for PropertyID $propertyID and UserID $userID.";
    } else {
        // SQL query to delete the maintenance request
        $sql = "DELETE FROM maintenance_requests WHERE PropertyID = ? AND UserID = ?";

        // Use prepared statements for security
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $propertyID, $userID);

        // Execute the query
        if ($stmt->execute()) {
            echo "Maintenance request for PropertyID $propertyID and UserID $userID has been deleted successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close(); // Close the statement
    }

    $conn->close(); // Close the database connection
}
?>
