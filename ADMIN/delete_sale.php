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

    // Validate if PropertyID exists in the sales table
    $check_sql = "SELECT COUNT(*) FROM sales WHERE PropertyID = ?";
    $stmt_check = $conn->prepare($check_sql);
    $stmt_check->bind_param("i", $propertyID);
    $stmt_check->execute();
    $stmt_check->bind_result($sale_exists);
    $stmt_check->fetch();
    $stmt_check->close();

    // If the PropertyID exists, proceed to delete it
    if ($sale_exists) {
        // SQL query to delete the sale record based on PropertyID
        $sql = "DELETE FROM sales WHERE PropertyID = ?";

        // Use prepared statements for security
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $propertyID);  // 'i' for integer (PropertyID)

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo "Sale record for PropertyID $propertyID deleted successfully!";
            } else {
                echo "Error: No matching PropertyID found.";
            }
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close(); // Close the statement
    } else {
        echo "Error: PropertyID $propertyID does not exist in the sales table.";
    }

    $conn->close(); // Close the database connection
}
?>
