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
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);
    $userID = intval($_POST['userID']); // Ensure it's an integer

    // Validate foreign key (UserID)
    $user_check_sql = "SELECT COUNT(*) FROM users WHERE UserID = ?";
    $stmt_user = $conn->prepare($user_check_sql);
    $stmt_user->bind_param("i", $userID);
    $stmt_user->execute();
    $stmt_user->bind_result($user_exists);
    $stmt_user->fetch();
    $stmt_user->close();

    if (!$user_exists) {
        echo "Error: UserID $userID does not exist.";
    } else {
        // SQL query to update feedback for the given user
        $sql = "UPDATE feedback 
                SET Comment = ? 
                WHERE UserID = ?";

        // Use prepared statements for security
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $comment, $userID);

        // Execute the query
        if ($stmt->execute()) {
            echo "Feedback updated successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close(); // Close the statement
    }

    $conn->close(); // Close the database connection
}
?>