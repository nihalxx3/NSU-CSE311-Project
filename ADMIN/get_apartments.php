<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection details
$servername = "localhost";
$username = "root";
$password = ""; // Empty for XAMPP
$dbname = "rems";

// Create a database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// SQL query to fetch all data from the apartments table
$sql = "SELECT * FROM apartments";
$result = mysqli_query($conn, $sql);

// Check if records exist
if (mysqli_num_rows($result) > 0) {
    // Fetch data and output each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['Address']) . "</td>";
        echo "<td>" . htmlspecialchars($row['UnitNumber'] ?: 'N/A') . "</td>";
        echo "<td>" . htmlspecialchars($row['PropertyID'] ?: 'N/A') . "</td>";
        echo "<td>" . htmlspecialchars($row['Size_sqft'] ?: 'N/A') . "</td>";
        echo "<td>" . htmlspecialchars($row['Bedrooms'] ?: 'N/A') . "</td>";
        echo "<td>" . htmlspecialchars($row['Bathrooms'] ?: 'N/A') . "</td>";
        echo "<td>" . htmlspecialchars(number_format($row['Price'], 2) ?: 'N/A') . "</td>";
        echo "</tr>";
    }
} else {
    // If no records exist
    echo "<tr><td colspan='7'>No apartments found</td></tr>";
}

// Close the database connection
mysqli_close($conn);
?>
