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
    // Get the AgentID from the form
    $agentID = $_POST['agentID'];

    // SQL query to delete the phone number from the agents_phonenumber table based on AgentID
    $sql = "DELETE FROM agents_phonenumber 
            WHERE AgentID = ?";

    // Use prepared statements for security
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $agentID);  // 'i' for integer (AgentID)
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo "Phone number(s) deleted successfully for Agent ID: $agentID!";
            } else {
                echo "No phone number found for Agent ID: $agentID.";
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
