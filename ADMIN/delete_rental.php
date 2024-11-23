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
    // Get the RentalID from the form
    $rentalID = intval($_POST['rentalID']);  // Ensure it's an integer

    // Validate if RentalID exists in the rentals table
    $check_sql = "SELECT COUNT(*) FROM rentals WHERE RentalID = ?";
    $stmt_check = $conn->prepare($check_sql);
    $stmt_check->bind_param("i", $rentalID);
    $stmt_check->execute();
    $stmt_check->bind_result($rental_exists);
    $stmt_check->fetch();
    $stmt_check->close();

    // If the rental exists, proceed to delete it
    if ($rental_exists) {
        // SQL query to delete the rental record
        $sql = "DELETE FROM rentals WHERE RentalID = ?";

        // Use prepared statements for security
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $rentalID);  // 'i' for integer (RentalID)

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo "Rental record with RentalID $rentalID deleted successfully!";
            } else {
                echo "Error: No matching RentalID found.";
            }
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close(); // Close the statement
    } else {
        echo "Error: RentalID $rentalID does not exist in the rentals table.";
    }

    $conn->close(); // Close the database connection
}
?>
