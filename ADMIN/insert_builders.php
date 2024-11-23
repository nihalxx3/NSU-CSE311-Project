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
    $builderID = intval($_POST['builderID']); // Ensure it's an integer
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);

    // Validation: Check if the BuilderID already exists
    $check_sql = "SELECT COUNT(*) FROM builders WHERE BuilderID = ?";
    $stmt_check = $conn->prepare($check_sql);
    $stmt_check->bind_param("i", $builderID);
    $stmt_check->execute();
    $stmt_check->bind_result($count);
    $stmt_check->fetch();
    $stmt_check->close();

    if ($count > 0) {
        echo "Error: BuilderID $builderID already exists.";
    } else {
        // SQL query to insert data
        $sql = "INSERT INTO builders (BuilderID, Fname, Lname) VALUES (?, ?, ?)";

        // Use prepared statements for security
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iss", $builderID, $fname, $lname);

        // Execute the query
        if ($stmt->execute()) {
            echo "Builder details added successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close(); // Close the statement
    }

    $conn->close(); // Close the database connection
}
?>
