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
    $agentID = $_POST['agentID'];
    $phoneNumber = $_POST['phoneNumber'];

    // Check if the AgentID exists before updating
    $agent_check_sql = "SELECT COUNT(*) FROM agents_phonenumber WHERE AgentID = ?";
    $stmt_agent_check = $conn->prepare($agent_check_sql);
    $stmt_agent_check->bind_param("i", $agentID);
    $stmt_agent_check->execute();
    $stmt_agent_check->bind_result($agent_exists);
    $stmt_agent_check->fetch();
    $stmt_agent_check->close();

    if (!$agent_exists) {
        echo "Error: AgentID $agentID does not exist.";
    } else {
        // SQL query to update agent's phone number
        $sql = "UPDATE agents_phonenumber 
                SET PhoneNumber = ? 
                WHERE AgentID = ?";

        // Use prepared statements for security
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $phoneNumber, $agentID);

        // Execute the query
        if ($stmt->execute()) {
            echo "Phone number updated successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close(); // Close the statement
    }

    $conn->close(); // Close the database connection
}
?>
