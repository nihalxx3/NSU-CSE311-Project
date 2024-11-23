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
    // Get the UserID from the form
    $userID = intval($_POST['userID']);  // Ensure it's an integer

    // Validate if UserID exists in the feedback table
    $check_sql = "SELECT COUNT(*) FROM feedback WHERE UserID = ?";
    $stmt_check = $conn->prepare($check_sql);
    $stmt_check->bind_param("i", $userID);
    $stmt_check->execute();
    $stmt_check->bind_result($feedback_exists);
    $stmt_check->fetch();
    $stmt_check->close();

    // If the UserID exists, proceed to delete the feedback
    if ($feedback_exists) {
        // SQL query to delete the feedback record based on UserID
        $sql = "DELETE FROM feedback WHERE UserID = ?";

        // Use prepared statements for security
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $userID);  // 'i' for integer (UserID)

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo "Feedback for UserID $userID deleted successfully!";
            } else {
                echo "Error: No matching UserID found in feedback.";
            }
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close(); // Close the statement
    } else {
        echo "Error: UserID $userID does not exist in feedback table.";
    }

    $conn->close(); // Close the database connection
}
?>
