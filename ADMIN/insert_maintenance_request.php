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
    $userID = intval($_POST['userID']); // Ensure it's an integer
    $requestDate = $_POST['requestDate']; // Ensure it's a valid date

    // Validate foreign keys (PropertyID and UserID)
    // Check if PropertyID exists
    $property_check_sql = "SELECT COUNT(*) FROM properties WHERE PropertyID = ?";
    $stmt_property = $conn->prepare($property_check_sql);
    $stmt_property->bind_param("i", $propertyID);
    $stmt_property->execute();
    $stmt_property->bind_result($property_exists);
    $stmt_property->fetch();
    $stmt_property->close();

    // Check if UserID exists
    $user_check_sql = "SELECT COUNT(*) FROM users WHERE UserID = ?";
    $stmt_user = $conn->prepare($user_check_sql);
    $stmt_user->bind_param("i", $userID);
    $stmt_user->execute();
    $stmt_user->bind_result($user_exists);
    $stmt_user->fetch();
    $stmt_user->close();

    if (!$property_exists) {
        echo "Error: PropertyID $propertyID does not exist.";
    } elseif (!$user_exists) {
        echo "Error: UserID $userID does not exist.";
    } else {
        // SQL query to insert data into maintenance_requests table
        $sql = "INSERT INTO maintenance_requests (PropertyID, UserID, RequestDate)
                VALUES (?, ?, ?)";

        // Use prepared statements for security
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iis", $propertyID, $userID, $requestDate);

        // Execute the query
        if ($stmt->execute()) {
            echo "Maintenance request added successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close(); // Close the statement
    }

    $conn->close(); // Close the database connection
}
?>
